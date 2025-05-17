<?php

namespace App\Http\Controllers\User;

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

    // Store a newly created return request in the database
    public function store(Request $request)
    {

        //fetch asset_assignment id based on the asset id and user id
        $assetAssignment = AssetAssignment::where('asset_id', $request->asset)->where('user_id', $request->user)->get()->first();
        //dd($assetAssignment,$request);
        
        //create  new row in asset_return_request table
        AssetReturnRequest::create([
            'asset_id' => $assetAssignment->asset_id,
            'user_id' => $assetAssignment->user_id,
            'asset_assignment_id' => $assetAssignment->id,
            'status' => 'admin-pending',
            'notes' => $request->notes,


        ]);

        //update return_reqested column in asset_assignment table to true
        AssetAssignment::where('asset_id', $request->asset)->where('user_id', $request->user)->update([
            'return_requested' => true

        ]);

        //return to route user.dashboard
        return redirect()->route('user.dashboard')->with('success', 'Return request submitted successfully.');
    }

    // display return request details

    public function show($requestid)
    {

        $assetReturnRequest = AssetReturnRequest::with(['assetAssignment.asset', 'assetAssignment.user', 'asset'])
            ->where('id', $requestid)
            ->firstOrFail();


        return view('user.returnrequest', compact('assetReturnRequest'));
    }
    public function cancel($id)
    {
        $returnRequest = AssetReturnRequest::findOrFail($id);

        // Update the status to 'rejected' or any appropriate status
        $returnRequest->status = 'user-cancelled';
        $returnRequest->save();
        // Update the return_requested column to false in the asset_assignments table
        AssetAssignment::where('asset_id', $returnRequest->asset_id)->update(['return_requested' => false]);

        return redirect()->route('user.dashboard')
            ->with('success', 'Return request has been cancelled successfully.');
    }
}
