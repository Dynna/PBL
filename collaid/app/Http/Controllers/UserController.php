<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


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
                    'past_experience' => 'nullable',
                    'avatar' => 'sometimes|image|mimes:jpg,jpeg,bmp,svg,png|max:5000'
                ]);
            }

      /*      if (request()->has('avatar')){
                $avatar_uploaded = request()->file('avatar');
                $avatar_name = time() . '.' . $avatar_uploaded->getClientOriginalExtension();
                $avatar_path = public_path('/images/');
                $avatar_uploaded->move($avatar_path, $avatar_name);
               Users::add([
                    'avatar' => '/images/' . $avatar_name
                ]);
                return redirect()->back();
               /* $user->avatar = $request['avatar' => '/images/' . $avatar_name];
                $user->save();*/
           /*     $request->session()->flash('success', 'Your profile has been updated successfully!');

                return redirect()->back();*/


            if($validate) {
                $user->first_name = $request['first_name'];
                $user->last_name = $request['last_name'];
                $user->email = $request['email'];
                $user->date_of_birth = $request['date_of_birth'];
                $user->provided_service = $request['provided_service'];
                $user->past_experience = $request['past_experience'];
            //    $user->avatar = $request['avatar'];

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
            'g-recaptcha-response' => 'required'
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

        Log::info('Showing the user profile for user: '.$id);
        if($user) {
            return view('user.profile')->withUser($user);
        } else {
            return redirect()->back();
        }
    }

    public function editAvatar() {
        if(Auth::user()){
            return view('user.avatar');
        } else {
            return redirect()->back();
        }
    }

    // to be adjusted
    public function updateAvatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Users::find(Auth::user()->id);

        $avatarName = $user->id .'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('avatars',$avatarName);
        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }

    // to be adjusted
    public function passwordReset(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'g-recaptcha-response' => 'required'
        ]);

        $user = Users::find(Auth::user()->id);
        $user->password = Hash::make($request['password']);
        $user->save();
        Log::info('Resetting password for user: '.$user->id);
    }
}
