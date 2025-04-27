<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function Registeration(){
        return view('front.account.registeration'); //registeration view is in front folder in acccount folder

    }


    public function processRegisteration(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required | min:6|same:confirm_password',
            'confirm_password' => 'required | same:password',
        ]);

        if($validator->passes()){

        }
        else {
            return response()->json([   // response in json format
                'status' => false, // status false
                'errors' => $validator->errors() // errors
            ]);
        }
    }
    public function Login(){
    

    }
}
