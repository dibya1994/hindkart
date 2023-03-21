<?php

namespace App\Http\Controllers;

use App\Models\MerchantFranchise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class MerchantFranchiseController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('merchant.index');
    }

    
    public function login(Request $request)
    {
        // dd($request->all());
        if(Auth::guard('merchant')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/merchant/dashboard');
        }
        else
        {
            return redirect('/merchant')->withInput()->with('error', 'Invalid Credentials');
        }
    }

    public function dashboard()
    {   
        return view('merchant.dashboard');
    }
    public function profile()
    {
        return view('merchant.profile');
    }

    public function update_profile(Request $request)
    {
            $result=array(
                'name'=>$request->name,
                'email'=>$request->email
            );
               $status = DB::table('merchants')
                  ->where('id', Auth::guard('merchant')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/merchant/profile')->with('success', 'Updated Successfully');
            }
            else{
                return redirect('/merchant/profile')->with('error', 'Something Went Wrong');
            }
           
    }
    public function change_password()
    {
        return view('merchant.change_password');
    }

    public function update_password(Request $request)
    {
            $result=array(
                'password'=>Hash::make($request->password)
            );
               $status = DB::table('merchants')
                  ->where('id', Auth::guard('merchant')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/merchant/change-password')->with('success', 'Password Changed Successfully');
            }
            else{
                return redirect('/merchant/change-password')->with('error', 'Something Went Wrong');
            }
        
           
    }
    public function logout()
    {
        Auth::guard('merchant')->logout();
        return redirect('/merchant/');
    }
}