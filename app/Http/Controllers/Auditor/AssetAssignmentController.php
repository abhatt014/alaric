<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Asset;
use Illuminate\Http\Request;
use App\Models\AssetAssignment;
use App\Http\Controllers\Controller;
use App\Models\AssetActivityTimeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AssetAssignmentController extends Controller
{
    //display assignment form
    public function index()
    {
        // Fetch all users
        $users = User::all();

        // Fetch all unassigned assets
        $unassignedAssets = Asset::where('asset_status', 'unassigned')->get();

        return view('admin.assignasset', compact('users', 'unassignedAssets'));
    }
    public function assign(Request $request)
    {
        $rules = [
            'asset_id' => 'required|exists:assets,id',
            'user_id' => 'required|exists:users,id',
            'image_path' => 'required|array',
            'image_path.*' => 'required|mimes:pdf,PDF,jpg,JPG,jpeg,JPEG,png,PNG|max:5120',
        ];
        $validator = Validator::make($request->all(), $rules);
        //Check validation
        if ($validator->fails()) {
            //dd($validator->errors());
            return redirect()->route('admin.assignasset')->withInput()->withErrors($validator);
        } else {
            // process the image
            foreach ($request->file('image_path') as $file) {
                // Generate a unique file name using the time() function
                $uniqueName = time() . '_' . $file->getClientOriginalName();

                // Store the image in the 'public/assets' directory
                $file->move(public_path('uploads/assets'), $uniqueName);

                // store file names in array
                $imagePaths[] = $uniqueName;

                // Save the file name to the database

            }

            AssetAssignment::create([
                'asset_id' => $request->asset_id,
                'user_id' => $request->user_id,
                'activity_notes' => "",
                'action_by' => Auth::guard('admin')->user()->id,
                'activity_images' => json_encode($imagePaths),
                'assigned_at' => now(),

            ])->save();
            //update asset_status column
            Asset::where('id', $request->asset_id)->update(['asset_status' => 'assigned']);

            // Create activity timeline record
            $activityTimeline = new AssetActivityTimeline();
            $activityTimeline->asset_id = $request->asset_id;
            $activityTimeline->user_id = $request->user_id;
            $activityTimeline->action = 'assigned';
            if (isset($imagePaths)) {
                $activityTimeline->images = json_encode($imagePaths);
            } else {
                $activityTimeline->images = null;
            }

            $activityTimeline->action_date = now();
            
            // fetch username from users table where id = user_id
            $user = User::where('id', $request->user_id)->first();
            if ($user) {
                $activityTimeline->notes = "Asset Assigned to User : " . $user->first_name . ' ' . $user->last_name. '(' .$user->email.')';
            }
           
            //dd($activityTimeline);
            $activityTimeline->save();

            return redirect()->route('admin.assets')->with('success', 'Asset Assigned successfully');
        }
    }

    public function unassign(Request $request)
    {
        $validatedData = $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'return_notes' => 'required|string',
            'return_images' => 'required|image',
        ]);

        $returnImagesPath = $request->file('return_images')->store('returns', 'public');

        $assignment = AssetAssignment::where('asset_id', $validatedData['asset_id'])
            ->whereNull('returned_at')
            ->firstOrFail();

        $assignment->update([
            'returned_at' => now(),
            'return_notes' => $validatedData['return_notes'],
            'return_images' => $returnImagesPath,
        ]);

        return redirect()->back()->with('success', 'Asset unassigned successfully.');
    }
}
