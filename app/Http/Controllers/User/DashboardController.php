<?php

namespace App\Http\Controllers\User;

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
        
        $totalAssets = AssetAssignment::where('user_id', Auth::id())->where('returned_at', null)->count();
       
       //fetch all asset_return_requests of the authenticated user along with asset_assignment details
        $returnRequests = AssetReturnRequest::where('user_id', Auth::id())->get();
        
        //dd($returnRequests);
        
        return view('user.dashboard',compact('totalAssets','returnRequests'));
    }
}
