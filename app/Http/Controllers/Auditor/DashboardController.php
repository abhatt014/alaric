<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetReturnRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //show authenticated admin users's dashboard
    public function index() {
        $totalLaptops = Asset::where('asset_type', '1')->count();
        $totalDesktops = Asset::where('asset_type', '2')->count();
        $totalMonitors = Asset::where('asset_type', '3')->count();
        $totalConsumables = Asset::where('is_consumable', 'yes')->count(); 
        // display all the asset return requets from the asset_return_requests table with relations where status is pending
        $returnRequests = AssetReturnRequest::with('asset')->where('status', 'pending')->get();
        
        return view('admin.dashboard',compact('totalLaptops','totalDesktops','totalMonitors','totalConsumables','returnRequests'));
    }
}
