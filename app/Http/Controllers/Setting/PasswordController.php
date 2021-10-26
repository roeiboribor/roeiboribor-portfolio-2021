<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\PasswordStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function create()
    {
        return view('settings.profile.create');
    }

    /**
     * Store new password & logout the current User
     *
     * @param  mixed $request
     * @return void
     */
    public function store(PasswordStoreRequest $request)
    {
        $user = Auth::user();
        $hashedPassword = $user->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user->forceFill([
                'password' => Hash::make($request->new_password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));

            Auth::guard('web')->logout();

            return redirect()->route('login');
        } else {
            return back()->with([
                'status' => 'error',
                'message' => "Old password didn't match",
            ]);
        }
    }
}
