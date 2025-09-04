<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetType;
use App\Models\AssetReturnRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Resolve type ids by name to avoid hardcoded ids
        $types = AssetType::whereIn('type_name', ['Laptop','Desktop','Monitor'])
            ->pluck('id','type_name');

        $laptopId  = $types->get('Laptop');
        $desktopId = $types->get('Desktop');
        $monitorId = $types->get('Monitor');

        // KPIs
        $totalLaptops   = $laptopId  ? Asset::where('asset_type', $laptopId)->count() : 0;
        $totalDesktops  = $desktopId ? Asset::where('asset_type', $desktopId)->count() : 0;
        $totalMonitors  = $monitorId ? Asset::where('asset_type', $monitorId)->count() : 0;

        // If you still keep consumables in assets (is_consumable = 'yes')
        $totalConsumables = Asset::where('is_consumable', 'yes')->count();

        // Pending returns for Admin/HR queues
        $returnRequests = AssetReturnRequest::with(['asset', 'user'])
            ->whereIn('status', ['admin-pending', 'hr-pending'])
            ->latest('created_at')
            ->get();

        // Optional: small aggregates for cards
        $totalAssets      = Asset::count();
        $assignedCount    = Asset::where('asset_status', 'assigned')->count();
        $availableCount   = Asset::where('asset_status', 'unassigned')->count(); // or 'available' if you renamed
        $faultyCount      = Asset::where('asset_status', 'faulty')->count();
        $disposedSoldCount= Asset::whereIn('asset_status', ['disposed','sold'])->count();

        return view('admin.dashboard', compact(
            'totalLaptops','totalDesktops','totalMonitors','totalConsumables',
            'returnRequests','totalAssets','assignedCount','availableCount','faultyCount','disposedSoldCount'
        ));
    }
}
