<?php

namespace App\Http\Controllers;

use App\Models\EmployeeFranchise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class EmployeeFranchiseController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('employee.index');
    }

    
    public function login(Request $request)
    {
        // dd($request->all());
        if(Auth::guard('employee')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/employee/dashboard');
        }
        else
        {
            return redirect('/employee')->withInput()->with('error', 'Invalid Credentials');
        }
    }

    public function dashboard()
    {
        return view('employee.dashboard');
    }
    public function profile()
    {
        return view('employee.profile');
    }

    public function update_profile(Request $request)
    {
            $result=array(
                'name'=>$request->name,
                'email'=>$request->email
            );
               $status = DB::table('employees')
                  ->where('id', Auth::guard('employee')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/employee/profile')->with('success', 'Updated Successfully');
            }
            else{
                return redirect('/employee/profile')->with('error', 'Something Went Wrong');
            }
           
    }
    public function change_password()
    {
        return view('employee.change_password');
    }

    public function update_password(Request $request)
    {
            $result=array(
                'password'=>Hash::make($request->password)
            );
               $status = DB::table('employees')
                  ->where('id', Auth::guard('employee')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/employee/change-password')->with('success', 'Password Changed Successfully');
            }
            else{
                return redirect('/employee/change-password')->with('error', 'Something Went Wrong');
            }
        
           
    }
    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect('/employee/');
    }


    public function view_merchant()
    {
        return view('employee.merchant.view');
    }
    public function create_merchant()
    {
        return view('employee.merchant.create');
    }

    public function store_merchant(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1000',
            'phone' => 'required|digits:10',
            'email'=> 'required|unique:merchants',
        ]);
        $imageName = date('Ymdhis').'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('user_image'), $imageName);

        
        $val=array(
            'zone_partner_id'=>Auth::guard('employee')->user()->zone_partner_id,
            'district_partner_id'=>Auth::guard('employee')->user()->district_partner_id,
            'block_partner_id'=>Auth::guard('employee')->user()->block_partner_id,
            'employer_id'=>Auth::guard('employee')->user()->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'image'=>$imageName,
            'active_status'=>'NO'
        );

       $affected = DB::table('merchants')->insert($val);
          
        if($affected==true)
        {
            return redirect('/employee/merchant/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/employee/merchant/create')->with('error', 'Something Went Wrong');
        }
    }
    
}