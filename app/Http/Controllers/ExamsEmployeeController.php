<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamsEmployeeController extends Controller
{
public function check(Request $request)
{
$request->validate([
    'email' => ['required', 'string', 'email', 'max:255', 'exists:exams_employees'],
    'password' => ['required', 'string', 'min:8'],
]);
$creds=$request->only('email','password');
if(Auth::guard('exam')->attempt($creds)){
    return redirect()->route('exam.home');
}
else{
    return redirect()->route('exam.login')->with('fail','Incorrect Credentials');
}

}
}
