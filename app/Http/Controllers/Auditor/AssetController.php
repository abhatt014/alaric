<?php

namespace App\Http\Controllers\Admin;

use App\Models\Asset;
use App\Models\AssetActivityTimeline;
use App\Models\AssetType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AssetController extends Controller
{
    public function index()
    {
        //fetch all assets from assets table sort in descending order

        $assets = Asset::with(['currentAssignment.user'])->orderBy('updated_at', 'desc')->get();
        //dd($assets);
        return view('admin.assets', compact('assets'));
    }

    public function create()
    {
        $assetTypes = AssetType::all();
        return view('admin.createasset', compact('assetTypes'));
    }
    public function store(Request $request)
    {

        //dd($request->all());
        $rules = [
            'asset_type' => 'required|exists:asset_types,id',
            'asset_brand' => 'required|string',
            'asset_model' => 'required',
            'asset_name' => 'required|string',
            'asset_ipaddress' => 'nullable|string',
            'asset_serial' => 'required|string|unique:assets,asset_serial',
            'asset_ram' => 'nullable|numeric',
            'asset_ssd' => 'nullable|numeric',
            'asset_hdd' => 'nullable|numeric',
            'asset_mac' => 'nullable|string',
            'asset_processor' => 'nullable|string',
            'asset_resolution' => 'nullable|string',
            'purchase_date' => 'required|date',
            'purchase_cost' => 'required|numeric',
            'notes' => 'required',
            'image_path' => 'required|array',
            'image_path.*' => 'required|mimes:pdf,PDF,jpg,JPG,jpeg,JPEG,png,PNG|max:5120',
            'invoice' => 'required|array',
            'invoice.*' => 'required|mimes:pdf,PDF|max:5120',
        ];
        $validator = Validator::make($request->all(), $rules);
        //Check validation
        if ($validator->fails()) {

            return redirect()->route('admin.addnewasset')->withInput()->withErrors($validator);
        } else {
            // Process the date

            $purchaseDate = $request->purchase_date;

            if ($purchaseDate) {
                $purchase_date = Carbon::createFromFormat('Y-m-d', $purchaseDate)->format('Y-m-d');
            }

            $asset = new Asset();
            $asset->asset_type = $request->asset_type;
            $asset->asset_brand = $request->asset_brand;
            $asset->asset_model = $request->asset_model;
            $asset->asset_name = $request->asset_name;
            $asset->asset_ipaddress = $request->asset_ipaddress ?? '';
            $asset->asset_serial = $request->asset_serial;
            $asset->asset_ram = $request->asset_ram ?? '';
            $asset->asset_ssd = $request->asset_ssd ?? '';
            $asset->asset_hdd = $request->asset_hdd ?? '';
            $asset->asset_mac = $request->asset_mac ?? '';
            $asset->asset_processor = $request->asset_processor ?? '';
            $asset->asset_resolution = $request->asset_resolution ?? '';
            $asset->asset_status = 'unassigned';
            $asset->purchase_date = $purchase_date ?? '';
            $asset->purchase_cost = $request->purchase_cost ?? '';
            $asset->notes = $request->notes ?? '';
            if ($request->consumable == 'on') {
                $asset->is_consumable = 'yes';
            }

            $asset->save();
            //handle images

            foreach ($request->file('image_path') as $file) {
                // Generate a unique file name using the time() function
                $uniqueName = time() . '_' . $file->getClientOriginalName();

                // Store the image in the 'public/assets' directory
                $file->move(public_path('uploads/assets'), $uniqueName);

                // store file names in array
                $imagePaths[] = $uniqueName;

                // Save the file name to the database

            }
            $asset->image_path = json_encode($imagePaths);
            $asset->save();

            //handle invoice
            foreach ($request->file('invoice') as $file) {
                // Generate a unique file name using the time() function
                $uniqueName = time() . '_' . $file->getClientOriginalName();

                // Store the image in the 'public/assets' directory
                $file->move(public_path('uploads/assets'), $uniqueName);

                // store file names in array
                $invoicePaths[] = $uniqueName;

                // Save the file name to the database

            }
            $asset->invoice = json_encode($invoicePaths);
            $asset->save();

            // Create activity timeline record
            $activityTimeline = new AssetActivityTimeline();
            $activityTimeline->asset_id = $asset->id;
            $activityTimeline->user_id = Auth::guard('admin')->user()->id;
            $activityTimeline->action = 'created';
            $activityTimeline->images = json_encode($imagePaths);
            $activityTimeline->action_date = now();
            $activityTimeline->notes = "New asset added";
            $activityTimeline->save();

            return redirect()->route('admin.assets')->with('success', 'Asset added successfully');
        }
    }
    //show edit asset form
    public function edit($asset)
    {
        $assetTypes = AssetType::all();
        //$asset = Asset::findOrFail($asset);
        $asset = Asset::with(['assetType', 'currentAssignment.user'])->findOrFail($asset);
        // Decode JSON fields
        $asset->images = json_decode($asset->image_path, true) ?? [];
        $asset->invoice = json_decode($asset->invoice, true) ?? [];

        //get activity history for asset
        $activityTimeline = AssetActivityTimeline::where('asset_id', $asset->id)->get();

        // Pass to the view
        //dd($asset);
        return view('admin.editasset', compact('asset', 'activityTimeline','assetTypes'));

        
    }

    //asset update method
    public function update(Asset $asset, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'asset_type' => 'nullable|exists:asset_types,id',
            'asset_brand' => 'nullable|string',
            'asset_model' => 'nullable',
            'asset_name' => 'nullable|string',
            'asset_ipaddress' => 'nullable|string',
            'asset_serial' => 'nullable|string|unique:assets,asset_serial,' . $asset->id,
            'asset_status' => 'nullable|in:unassigned,assigned,faulty,disposed,sold',
            'asset_ram' => 'nullable|numeric',
            'asset_ssd' => 'nullable|numeric',
            'asset_hdd' => 'nullable|numeric',
            'asset_mac' => 'nullable|string',
            'asset_processor' => 'nullable|string',
            'asset_resolution' => 'nullable|string',
            'purchase_date' => 'nullable|date',
            'purchase_cost' => 'nullable|numeric',
            'notes' => 'nullable',
            'image_path' => 'nullable|array',
            'image_path.*' => 'nullable|mimes:pdf,PDF,jpg,JPG,jpeg,JPEG,png,PNG|max:5120',
            'invoice' => 'nullable|array',
            'invoice.*' => 'nullable|mimes:pdf,PDF|max:5120',
        ]);
        if ($validator->fails()) {
           
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $validatedData = $validator->validated();
        // Update only modified values
        $fieldsToUpdate = [];
        foreach ($validatedData as $key => $value) {
            if ($asset[$key] != $value) {
                $fieldsToUpdate[$key] = $value;
            }
        }
        unset($fieldsToUpdate['image_path']);
        
        //handle images
        if($request->file('image_path') != null){
            foreach ($request->file('image_path') as $file) {
                // Generate a unique file name using the time() function
                $uniqueName = time() . '_' . $file->getClientOriginalName();
    
                // Store the image in the 'public/assets' directory
                $file->move(public_path('uploads/assets'), $uniqueName);
    
                // store file names in array
                $imagePaths[] = $uniqueName;
    
                // Save the file name to the database
    
            }
            //$fieldsToUpdate['image_path'] = json_encode($imagePaths);
        }
        

        //handle invoice
        if($request->file('invoice') != null){
            foreach ($request->file('invoice') as $file) {
                // Generate a unique file name using the time() function
                $uniqueName = time() . '_' . $file->getClientOriginalName();
    
                // Store the image in the 'public/assets' directory
                $file->move(public_path('uploads/assets'), $uniqueName);
    
                // store file names in array
                $invoicePaths[] = $uniqueName;
    
                // Save the file name to the database
    
            }
            $fieldsToUpdate['invoice'] = json_encode($invoicePaths );
    
        }
        
        //dd($fieldsToUpdate);
        $asset = Asset::find(id: $request->id);
        $asset->update($fieldsToUpdate);
        
        // Create activity timeline record
         $activityTimeline = new AssetActivityTimeline();
         $activityTimeline->asset_id = $asset->id;
         $activityTimeline->user_id = Auth::guard('admin')->user()->id;
         $activityTimeline->action = 'modified';
         if(isset($imagePaths)){
            $activityTimeline->images = json_encode($imagePaths);
        }else{
            $activityTimeline->images = null;
        }
         
         $activityTimeline->action_date = now();
          //convert array to json
          $data = json_encode($fieldsToUpdate);
         $activityTimeline->notes = $data;
        //dd($activityTimeline);
         $activityTimeline->save();

        return redirect()->route('admin.assets')->with('success', 'Asset updated successfully');
    }

    //view  asset details which is requested for return by the user




}
