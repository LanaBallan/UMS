<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamsEmployeeController extends Controller
{
public function check(Request $request)
{
    $request->validate([
        'email' => ['required', 'string', 'email', 'max:255', 'exists:exams_employees'],
        'password' => ['required', 'string', 'min:8'],
    ]);

    $creds = $request->only('email', 'password');

    if (Auth::guard('examsEmployee')->attempt($creds)) {
        return redirect()->route('exams.home');
    } else {
        return redirect()->route('exams.login')->with('fail', 'Incorrect Credentials');
    }
}
    public function logout()
{
    Auth::guard('examsEmployee')->logout();
    return redirect("/");
}
}

