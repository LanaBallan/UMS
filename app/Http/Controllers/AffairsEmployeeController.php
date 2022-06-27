<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffairsEmployeeController extends Controller
{
    public function check(Request $request)
    {


        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:students_affairs_employees'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('affairsEmployee')->attempt($creds)) {
            return redirect()->route('affairs.home');
        } else {
            return redirect()->route('affairs.login')->with('fail', 'Incorrect Credentials');
        }
    }
    public function logout()
    {
        Auth::guard('affairsEmployee')->logout();
        return redirect("/");
    }
}
