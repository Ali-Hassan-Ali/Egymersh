<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use validator;

class AdminAuthController extends Controller
{

    public function login_form()
    {
        if (Auth::guard('admin')->check()) {

            return redirect()->route('Dashboard');
            
        } else {

            return view('dashboard.login');

        }//end of if

    }//end of login form


    public function login(Request $request)
    {

        $validated = $this->validate($request, [
            'username' => 'required', 
            'password' => 'required', 
        ]);

        try {

            if (Admin::where('username',$request->username)->first()) {
                
                $credentials = $request->only('username'  , 'password' );

                if (Auth::guard('admin')->attempt($credentials)) {
                    
                    return redirect()->route('Dashboard');

                } else {
                    
                    return redirect()->back()->with(['password' => 'No password'])->withInput();

                }//end of attempt

            } else {

                return redirect()->back()->with(['username' => 'No username'])->withInput();

            }//end of username

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            
        }//end of try catch

    }//end of login



    public function logout()
    {
        \Auth::guard('admin')->logout();
        
        return redirect(route('login_form'));

    }//end of logout
  
}//end of controller
