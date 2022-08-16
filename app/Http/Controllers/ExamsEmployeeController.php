<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ExamsEmployee;
use App\Models\StudentsAffairsEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamsEmployeeController extends Controller
{
public function check(Request $request)
{
    $request->validate([
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8'],
    ]);
    $creds = $request->only('email', 'password');
    if (Auth::guard('examsEmployee')->attempt($creds)) {
        return redirect()->route('exams.home');
    }
else if(Auth::guard('affairsEmployee')->attempt($creds))
{
            return redirect()->route('affairs.home');}

else if(Auth::attempt($creds)){
    return redirect()->route('manager.home');
}
else {
    return redirect()->route('exams.login')->with('fail', 'Incorrect Credentials');
}
}
    public function logout()
{
    Auth::guard('examsEmployee')->logout();
    return redirect()->route('exams.login');
}
public function home()
{
    $requests= \App\Models\Request::with('get_student')->  where([
        ['requests.status','1'],
        ['requests.type','=','وثيقة ترفع']])
        ->orWhere([
            ['requests.status','1'],
            ['requests.type','=','كشف علامات']])->get();
    return view('Exams Dashboard.Request.all',compact('requests'));
}
}

