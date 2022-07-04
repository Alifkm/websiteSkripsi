<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //
    public function index() {
        return view('changePassword.index');
    }

    public function changePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', 'string', 'min:6', 'confirmed']
        ]);

        if(!Hash::check($request->current_password, auth()->user()->password)){
            return back()->with('error', "Current Password Doesn't match!");
        }

        Admin::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('message', auth()->user()->name . ' password changed successfully!');
    }
}
