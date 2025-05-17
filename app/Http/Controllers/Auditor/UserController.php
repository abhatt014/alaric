<?php

namespace App\Http\Controllers\Auditor;


use App\Models\User;
use App\Models\Asset;
use Illuminate\Http\Request;
use App\Models\AssetAssignment;
use App\Http\Controllers\Controller;
use App\Models\AssetType;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function adminDashboard()
    {   
        // fetch the total assets in each catagory
        
        $totalLaptops = Asset::where('asset_type', '1')->count();
        $totalDesktops = Asset::where('asset_type', '2')->count();
        $totalMonitors = Asset::where('asset_type', '3')->count();
        $totalConsumables = Asset::where('is_consumable', 'yes')->count(); 

        
                 
        return view('admin.dashboard',compact('totalLaptops','totalDesktops','totalMonitors','totalConsumables'));
    }

    public function userDashboard()
    {
        //$userAssets = AssetAssignment::where('user_id', Auth::id())->get();
        //return view('user.dashboard', compact('userAssets'));
    }

    public function index()
    {
        //dd('iamhere');
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function create()
    {
        return view('admin.useradd');
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|in:admin,user',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'employee_id' => 'required',
            
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        //fetch the user
        
        return view('admin.useredit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
       
       //if password field is null,then add valitaion rule for password
         if ($request->password == null){ 
            $rules = [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'employee_id' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role' => 'required|in:admin,user',
                
            ];       
            
        }
        else{
            $rules = [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'employee_id' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role' => 'required|in:admin,user',
                'password' => 'required|min:8',
            ];       
        }
        
        $validator = Validator::make($request->all(), $rules);
       
        //Check validation
        if ($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $validatedData = $request->all();
            if ($request->password == null) {
               //remove password index from $validatedData
                unset($validatedData['password']);
            } else {
                $validatedData['password'] = bcrypt($validatedData['password']);
            }         
            //dd($validatedData);
            $user->update($validatedData);

            return redirect()->route('admin.users')->with('success', 'User updated successfully.');
        }
        
        
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

}
