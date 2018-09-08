<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Model\User;
use App\Http\Model\Customer;
use App\Http\Model\Merchant;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    public function signupCust(Request $request){
        
        $user = new User([
            'idUser'=> 1,
            'userName'=>$request->user_name,
            'password'=>Hash::make($request->password),
            // ,  'prevPassword', 'lastLogin';
        ]);
        $customer = new Customer([
            'firstName' => $request->first_name, 
            'lastName' => $request->last_name, 
            'mobile' => $request->mobile, 
            'email' => $request->email,
        ]);
        
        $user->save();
        $user->customer()->save($customer);
        

        //$customer->save();

        return response()->json([
            'message' => 'Berhasil mendaftar sebagai customer!'
        ], 201);
    }

    public function signupMerch(Request $request){
        $user = new User([
            'userName'=>$request->get('user_name'),
            'password'=>$request->get('password'),
            // ,  'prevPassword', 'lastLogin';
        ]);
        $customer = new Merchant([
            'idUser' => $request->get('user_name'), 
            'name' => $request->get('nama'), 
            'description'=> $request->get('decription'),
        ]);
    }


}