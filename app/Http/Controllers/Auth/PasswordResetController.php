<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\Http\Model\User;
use App\Http\Model\PasswordReset;

class PasswordResetController extends Controller{
    public function create(Request $request){
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user)
            return response()->json([
                'message' => 'User dengan alamat e-mail tersebut tidak ditemukan.',
                'result' => '0'
            ], 404);

        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => str_random(60)
             ]
        );

        if ($user && $passwordReset)
            $user->notify(new PasswordResetRequest($passwordReset->token));

        return response()->json([
            'message' => 'Link reset password telah dikirim melalui email anda',
            'result' => '1'
        ]);
    }

    public function find($token){
        $passwordReset = PasswordReset::where('token', $token)
            ->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'Token reset password salah.'
            ], 404);
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'message' => 'Token reset password salah.'
            ], 404);
        }
        return response()->json($passwordReset);
    }

    public function reset(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'Token reset password salah..'
            ], 404);
        $user = User::where('email', $passwordReset->email)->first();

        if (!$user)
            return response()->json([
                'message' => 'Email user tersebut tidak dapat ditemukan.'
            ], 404);
            $user->password = bcrypt($request->password);
            $user->save();
            $passwordReset->delete();
            $user->notify(new PasswordResetSuccess($passwordReset));
            return response()->json($user);
        
    }
}