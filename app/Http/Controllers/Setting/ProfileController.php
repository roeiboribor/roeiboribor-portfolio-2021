<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('settings.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'password' => [
                'required', Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);

        try {

            $hashedPassword = Auth::user()->password;
            if (\Hash::check($request->oldpassword, $hashedPassword)) {
                if (\Hash::check($request->newpassword, $hashedPassword)) {

                    $users = User::find(Auth::user()->id);
                    $users->password = bcrypt($request->newpassword);
                    $users->save();

                    return redirect()->back()->with('status', 'success');
                } else {
                    session()->flash('message', 'new password can not be the old password!');
                    return redirect()->back();
                }
            } else {
                session()->flash('message', 'old password doesnt matched');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return back()->with('status', 'error');
        }
    }
}
