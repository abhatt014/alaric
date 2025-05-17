<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetAssignmentController extends Controller
{
    //show asset return form
    public function index()
    {
     
        $user = AUTH::guard('web')->user(); // Get the logged-in user

        // Fetch asset as per $id  assigned to the user where status column is pending in asset_return request table
        
        $asset = Asset::whereHas('assignments', function ($query) use ($user) {
            $query->where('user_id', $user->id)
                  ->whereNull('returned_at'); // Ensure the asset is currently assigned
        })->whereDoesntHave('returnRequests', function ($query) {
            $query->where('status', 'pending');
        })->with('assignments')->get();

     

       
       return view('user.assetreturn',compact('asset','user'));
    }
}
