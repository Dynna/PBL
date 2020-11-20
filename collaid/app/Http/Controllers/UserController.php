<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function edit(){
        if(Auth::user()){
            $user = Users::find(Auth::user()->id);

            if($user) {
                return view('user.edit')->withUser($user);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request) {
        $user = Users::find(Auth::user()->id);

        if($user) {
            $validate = null;
            if(Auth::user()->email === $request['email']) {
                $validate = $request->validate([
                    'first_name' => 'required|string',
                    'last_name' => 'required|string',
                    'email' => 'required|email',
                    'date_of_birth' => 'date',
                    'provided_service' => 'nullable',
                    'past_experience' => 'nullable'
                ]);
            } else {
                $validate = $request->validate([
                    'first_name' => 'required|string',
                    'last_name' => 'required|string',
                    'email' => 'required|email|unique:users',
                    'date_of_birth' => 'date',
                    'provided_service' => 'nullable',
                    'past_experience' => 'nullable'
                ]);
            }

            if($validate) {
                $user->first_name = $request['first_name'];
                $user->last_name = $request['last_name'];
                $user->email = $request['email'];
                $user->date_of_birth = $request['date_of_birth'];
                $user->provided_service = $request['provided_service'];
                $user->past_experience = $request['past_experience'];

                $user->save();
                $request->session()->flash('success', 'Your profile has been updated successfully!');

                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function passwordEdit() {
        if(Auth::user()){
                return view('user.password');
        } else {
            return redirect()->back();
        }
    }

    public function passwordUpdate(Request $request) {
        $validate = $request->validate([
            'oldPassword' => 'required|min:8',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Users::find(Auth::user()->id);

        if($user){
            if(Hash::check($request['oldPassword'], $user->password) && $validate) {
                $user->password = Hash::make($request['password']);

                $user->save();

                $request->session()->flash('success', 'Your password has been changed successfully!');

                return redirect()->back();
            } else {
                $request->session()->flash('error', 'The entered password does not match your current password!');

                return redirect()->route('password.edit');
            }
        }
    }

    public function profile($id) {
        $user = Users::find($id);

        if($user) {
            return view('user.profile')->withUser($user);
        } else {
            return redirect()->back();
        }
    }
}
