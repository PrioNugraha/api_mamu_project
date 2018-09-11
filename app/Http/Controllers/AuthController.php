<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Model\User;
use App\Http\Model\Customer;
use App\Http\Model\Merchant;
use App\Http\Model\UserRole;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    public function signupCust(Request $request){
        
        $user = new User([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'prev_password' => Hash::make($request->password),
            'last_login' => Carbon::now()
        ]);
        $customer = new Customer([
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name, 
            'mobile' => $request->mobile, 
        ]);
        $userRole = new UserRole([
            'id_role' => 1,
        ]);
        
        $user->save();
        $user->customer()->save($customer);
        $user->userRole()->save($userRole);
        //$customer->save();

        return response()->json([
            'message' => 'Berhasil mendaftar sebagai customer!'
        ], 201);
    }

    public function loginCust(Request $request){
        $credentials =  request(['email', 'password']);

        if(!Auth::attempt($credentials))
        return response()->json([
            'message'=>'Unauthorized'
        ],401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
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

    public function user(Request $request)
    {
        
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}