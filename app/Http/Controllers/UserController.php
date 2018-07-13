<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use Redirect;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function updatePassword(Request $request) {
        $form_data = $request->all();
        $messages = [
            'old_password.required' => 'Please enter your current password',
            'old_password.max' => 'Maximum 20 characters are allowed',
            'old_password.min' => 'Minimum 8 characters are allowed',
            'old_password.regex' => 'Passwords must be alphanumeric with at least 1 special character',
            'new_password.required' => 'Please enter your new password',
            'new_password.max' => 'Maximum 20 characters are allowed',
            'new_password.min' => 'Minimum 8 characters are allowed',
            'new_password.regex' => 'Passwords must be alphanumeric with at least 1 special character',
            'confirm_password.required' => 'Please confirm your new password',
            'confirm_password.max' => 'Maximum 20 characters are allowed',
            'confirm_password.min' => 'Minimum 8 characters are allowed',
            'confirm_password.regex' => 'Passwords must be alphanumeric with at least 1 special character',
        ];

        $validator = Validator::make($form_data, [
                    'old_password' => 'required|max:20|min:8|regex:/^(?=.*[a-z\s])(?=.*\d)(?=.*[$@$!%*?&])[a-z\d$@$!%*?&]{8,}/',
                    'new_password' => 'required|max:20|min:8|regex:/^(?=.*[a-z\s])(?=.*\d)(?=.*[$@$!%*?&])[a-z\d$@$!%*?&]{8,}/',
                    'confirm_password' => 'required|max:20|min:8|regex:/^(?=.*[a-z\s])(?=.*\d)(?=.*[$@$!%*?&])[a-z\d$@$!%*?&]{8,}/',
                        ], $messages);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors())->withInput();
        } else {
            if (preg_match('/\s/', $form_data['old_password']) == 1 ||
                    preg_match('/\s/', $form_data['new_password']) == 1 ||
                    preg_match('/\s/', $form_data['confirm_password']) == 1) {
                $msg = "Spaces are not allowed";
                return Redirect::back()->with('password_error', $msg);
            }
            //for comparing the pwd with the one stored in db
            if (!Hash::check($form_data['old_password'], Auth::user()->password)) {
                $msg = "Please re-enter the old password!";
                return Redirect::back()->with('password_error', $msg);
            }
            $userData = Auth::user();
            $userData->password = bcrypt($form_data['new_password']);
            //updating the password
            if ($userData->save()) {
                return back()->with('password_success', 'Password has been updated!');
            } else {
                //throw error
                return back()->with('password_error', 'Password could not be updated!');
            }
        }
    }

}
