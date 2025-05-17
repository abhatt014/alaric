<?php

namespace App\Http\Controllers\Auditor;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetActivityTimeline;
use App\Models\AssetAssignment;
use App\Models\AssetReturnRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AssetReturnRequestController extends Controller
{
    //show return asset form
    public function create(Asset $asset,User $user,Request $request){
        //dd($request,$assetid,$userid);
         
     
        return view('admin.returnasset',compact('asset','user'));
    }   
    //create new return request
    public function requestcreate(Asset $asset,User $user,Request $request){
        
       
        //fetch asset_assignment id based on the asset id and user id
        $assetAssignment = AssetAssignment::where('asset_id', $asset->id)->where('user_id', $user->id)->first();
       
        //update asset_return_request table
        AssetReturnRequest::create([
            'asset_id' => $asset->id,
            'user_id' => $user->id,
            'asset_assignment_id' => $assetAssignment->id,
            'status' => 'pending',
            'notes' => $request->notes,


        ]);
        
        //update return_reqested column in asset_assignment table to true
        AssetAssignment::where('asset_id', $asset->id)->where('user_id', $user->id)->update([
            'return_requested' => true

        ]);

       

        //return to route admin.dashboard
        return redirect()->route('admin.dashboard');
    }   

    public function index(AssetReturnRequest $assetReturnRequest)
    {

        //fetch userid
        $userId = $assetReturnRequest->user_id;

        //fetch assetid
        $assetId = $assetReturnRequest->asset_id;

        //fetch user details from the users table where id = userid
        $users = User::where('id', $userId)->get();

        //fetch asset details from the assets table where id = assetid
        $assets = Asset::where('id', $assetId)->get();
        
        //$images = json_decode($assets->image_path, true) ?? [];
        //$invoice =  json_decode($assets->invoice, true) ?? [];
        //get activity history for asset with relations
        $activityTimeline = AssetActivityTimeline::where('asset_id', $assetReturnRequest->asset_id)->get();
       


        //display the asset return requests
        return view('admin.viewreturns',compact('assetReturnRequest','assets','users','activityTimeline'));
    }  
    //process asset return request
    public function store( Request $request, AssetReturnRequest $assetReturnRequest){
        //dd($request,$assetReturnRequest);
        $userinfo = User::where('id', $assetReturnRequest->user_id)->get()->first();
                     
        // asset_assignments table set returned_at column to current timestamp
        AssetAssignment::where('asset_id', $assetReturnRequest->asset_id)->where('user_id', $assetReturnRequest->user_id)->update([
            'returned_at' => now()
        ]);
        
        // asset_return_requests table set status column to approved
        AssetReturnRequest::where('id', $assetReturnRequest->id)->update([
            'status' => 'approved'
        ]);

        // assets table update asset_status column to unassigned
        Asset::where('id', $assetReturnRequest->asset_id)->update([
            'asset_status' => 'unassigned'
        ]);

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
        // dd($assetReturnRequest);
         $data = "Return Accepted from user: ($userinfo->first_name $userinfo->last_name $userinfo->email)";
        AssetActivityTimeline::create([
            'asset_id' => $assetReturnRequest->asset_id,
            'user_id' => $assetReturnRequest->user_id,
            'action' => 'returned',
            'notes' => $data.' . Admin Comments: '.$request->return_notes,
            'images' => json_encode($imagePaths),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Return request Procesed successfully.');
        
    } 
    // process request cancelation
    public function cancel(AssetReturnRequest $assetReturnRequest){
        
        //dd($assetReturnRequest);
        //set return_requested column in asset_assignment table to false
        AssetAssignment::where('asset_id', $assetReturnRequest->asset_id)->where('user_id', $assetReturnRequest->user_id)->update([
            'return_requested' => false 
        ]);
        
     
        // asset_return_requests table set status column to approved
        AssetReturnRequest::where('id', $assetReturnRequest->id)->update([
            'status' => 'rejected'
        ]);

       
    

        return redirect()->route('admin.dashboard')->with('success', 'Return request Rejected successfully.');
        // dd($assetReturnRequest);
  
    }   

}
