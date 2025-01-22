<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Logincontroller extends Controller
{
    
    public function adminLogin(){
      return view('login.admin-login');
    }

    public function adminLogins(Request $request){
        // dd($request->all());
        $email = $request->username;
        $password = $request->password;

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {

             return response()->json(['status' => 'success']);
            // return redirect()->route('admin.index');
            // return view('employee.index');
        }

        return response()->json(['status' => 'error']);

    }


    public function memberLogin(){
        // return "11111";
        return view('frontend.login');
    }

    public function memberLogins(Request $request){
        // dd($request->all());

        $credentials = $request->only('email', 'password');

        if (Auth::guard('member')->attempt($credentials)) {
            $user = Auth::guard('member')->user();
            // $status = Auth::guard('member')->user()->approved_status;
            // $payment_status = Auth::guard('member')->user()->payment_status;

            // if($status == 0 || $payment_status == 0){
            //     return response()->json(['status' => 'approved']);
            // }

            if ($user->ExpiryDate && now()->gt($user->ExpiryDate)) {
                // Auth::guard('member')->logout();
                return response()->json(['status' => 'payment']);
            }

             return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error']);

    }

    public function memberlogout(Request $request){

        Auth::guard('member')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('memberLogin');

    }

}
