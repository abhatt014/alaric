<?php

namespace App\Http\Controllers\Hr;

use App\Models\User;
use App\Models\Asset;
use Illuminate\Http\Request;
use App\Models\AssetAssignment;
use App\Models\AssetReturnRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\AssetActivityTimeline;
use Illuminate\Support\Facades\DB;

class AssetReturnRequestController extends Controller
{

 //process asset return request
 public function store( Request $request, AssetReturnRequest $assetReturnRequest){
    //dd($request,$assetReturnRequest);
    $userinfo = User::where('id', $assetReturnRequest->user_id)->get()->first();
                 
    // asset_assignments table set returned_at column to current timestamp
    // AssetAssignment::where('asset_id', $assetReturnRequest->asset_id)->where('user_id', $assetReturnRequest->user_id)->update([
    //     'returned_at' => now()
    // ]);
    
    // asset_return_requests table set status column to approved
    AssetReturnRequest::where('id', operator: $assetReturnRequest->id)->update([
        'status' => 'approved'
    ]);

    // assets table update asset_status column to unassigned
    // Asset::where('id', $assetReturnRequest->asset_id)->update([
    //     'asset_status' => 'unassigned'
    // ]);

    //add entry to  asset_activity_timelines table 
    foreach ($request->file('image_path') as $file) {
        // Generate a unique file name using the time() function
        $uniqueName = time() . '_' . $file->getClientOriginalName();

        // Store the image in the 'public/assets' directory
        $file->move(public_path('uploads/assets'), $uniqueName);

        // store file names in array
        $imagePaths[] = $uniqueName;

        // Save the file name to the database

    }
    // change asset status to "unassigned" in assets table
    Asset::where('id', $assetReturnRequest->asset_id)->update(['asset_status' => 'unassigned']);
    //update asset_assignments table , change return requested to false and add date to returned_at column
    AssetAssignment::where('asset_id', $assetReturnRequest->asset_id)->where('user_id', $assetReturnRequest->user_id)->update(['returned_at' => now(), 'return_requested' => false]);

 
    // dd($assetReturnRequest);
     $data = "Return Accepted by HR from user: ($userinfo->first_name $userinfo->last_name $userinfo->email)";
    AssetActivityTimeline::create([
        'asset_id' => $assetReturnRequest->asset_id,
        'user_id' => $assetReturnRequest->user_id,
        'action' => 'returned',
        'notes' => $data.' . HR Comments: '.$request->return_notes,
        'images' => json_encode($imagePaths),
        'created_at' => now(),
        'updated_at' => now()
    ]);
    return redirect()->route('hr.dashboard')->with('success', 'Admin Approved Return request Procesed successfully.');
    
} 

    // display return request details

    public function show($requestid)
    {

        $assetReturnRequest = AssetReturnRequest::with(['assetAssignment.asset', 'assetAssignment.user', 'asset'])
            ->where('id', $requestid)
            ->firstOrFail();
            $userId = $assetReturnRequest->user_id;

            //fetch assetid
            $assetId = $assetReturnRequest->asset_id;
    
            //fetch user details from the users table where id = userid
            $users = User::where('id', $userId)->get();
    
            //fetch asset details from the assets table where id = assetid
            $assets = Asset::where('id', $assetId)->get();
            $activityTimeline = AssetActivityTimeline::where('asset_id', $assetReturnRequest->asset_id)->get();

        return view('hr.returnrequest', compact('assetReturnRequest','assets','users','activityTimeline'));
    }
    public function cancel($id)
    {
        $returnRequest = AssetReturnRequest::findOrFail($id);

        // Update the status to 'rejected' or any appropriate status
        $returnRequest->status = 'rejected';
        $returnRequest->save();
        // Update the return_requested column to false in the asset_assignments table
        AssetAssignment::where('asset_id', $returnRequest->asset_id)->update(['return_requested' => false]);

        return redirect()->route('user.dashboard')
            ->with('success', 'Return request has been cancelled successfully.');
    }
}
