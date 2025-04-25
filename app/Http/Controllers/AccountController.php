<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function Registeration(){
        return view('front.account.registeration');

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
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function Login(){

    }
}
