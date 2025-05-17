<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssetAssignment;
use App\Models\AssetReturnRequest;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //show user dashboard
    public function index()
    {   //calculate total assets of the authenticated user
        $totalAssets = AssetAssignment::where('user_id', Auth::guard('hr')->user()->id)->where('returned_at', null)->count();
       
       
       //fetch all asset_return_requests where status is hr-pending
        $returnRequests = AssetReturnRequest::where('status', 'hr-pending')->get();   
   
        
        //dd($returnRequests);
        
        return view('hr.dashboard',compact('totalAssets','returnRequests'));
    }
}
