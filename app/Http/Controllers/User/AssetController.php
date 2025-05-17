<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AssetAssignment;
use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    //show assinged assets to authenticated user
    public function index()
    {   
        // Get the currently logged-in user
        $user = Auth::guard('web')->user();   
        // Fetch assets assigned to the user
        $assets = Asset::whereHas('assignments', function ($query) use ($user) {
            $query->where('user_id', $user->id)
                  ->whereNull('returned_at'); // Ensure assets not returned yet
        })->with(['assetType', 'assignments'])->get();

       
      
        return view('user.assets', compact('assets'));
    }
    //view asset details as per asset id passed via request
    public function show(Asset $asset)
    {   
        $assetTypes = AssetType::all();
        $images = json_decode($asset->image_path, true) ?? [];
        //dd($asset,$assetTypes,$images);
        return view('user.viewasset', compact('asset', 'assetTypes','images'));
    }
}
