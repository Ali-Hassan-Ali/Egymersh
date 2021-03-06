<?php

namespace App\Http\Controllers\Site\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use Auth;

class LoginController extends Controller
{

    public function form()
    {
        if (Auth::guard('seller')->check()) {

            $user = auth()->guard('seller')->user();

            return view('site.myaccount' , compact('user'));
            
        } else {

            return view('site.login');

        }//end of if

    }//end of form


    public function login(Request $request)
    {
        $request->validate([
            'email'     => ['required'],
            'password'  => ['required'],
        ]);

        try {
            
            if (Seller::where('email',$request->email)->first()) {
                $credentials = $request->only('email','password');

                if (Auth::guard('seller')->attempt($credentials)) {
                     
                    if (Auth::guard('seller')->user()->seller == '1') {
                           
                        return redirect()->route('store.index');
                    }
                    
                        return redirect()->route('user.account');

                } else {
                    
                    return redirect()->back()->with(['password' => 'No password'])->withInput();

                }//end of attempt


            } else {
                
                return redirect()->back()->with(['email' => 'No password'])->withInput();

            } //end of email

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            
        }//end of try catch

    }//end of login



    public function logout()
    {
        \Auth::guard('seller')->logout();

        return redirect()->route('user.login_form');
        
    }//end pf logout 

    public function seller_logout()
    {
        \Auth::guard('seller')->logout();

        return redirect()->route('user.login_form');
        
    }//end pf logout 


}//end pf controller 
