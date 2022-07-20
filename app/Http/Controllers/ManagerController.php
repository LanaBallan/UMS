<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ExamsEmployee;
use App\Models\StudentsAffairsEmployee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function create(Request $request){

        if($request->role=='exam')
        {
            $request->validate(['f_name' => ['required', 'string', 'max:255'],
                'l_name' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:exams_employees'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],]);
            $examEmployee=new ExamsEmployee();
            $examEmployee->f_name=$request->f_name;
            $examEmployee->l_name=$request->l_name;
            $examEmployee->email=$request->email;
            $examEmployee->password= Hash::make($request->password);
            $save=$examEmployee->save();

        }
        else if($request->role=='affairs')
        {
            $request->validate([  'f_name' => ['required', 'string', 'max:255'],
                'l_name' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:students_affairs_employees'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],]);
            $affairsEmployee=new StudentsAffairsEmployee();
            $affairsEmployee->f_name=$request->f_name;
           $affairsEmployee->l_name=$request->l_name;
            $affairsEmployee->email=$request->email;
            $affairsEmployee->password= Hash::make($request->password);
            $save=$affairsEmployee->save();

        }
        else
        {
            $request->validate([  'f_name' => ['required', 'string', 'max:255'],
                'l_name' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],]);

            $manager=new User();
            $manager->f_name=$request->f_name;
            $manager->l_name=$request->l_name;
            $manager->email=$request->email;
            $manager->password= Hash::make($request->password);
            $save= $manager->save();
        }
if($save)
{
    return redirect()->back()->with('Success','You Are Registered');
}
else
{
    return redirect()->back()->with('Fail','Something Went Wrong');
}

    }
    public function check(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $creds=$request->only('email','password');
        if(Auth::attempt($creds)){
            return redirect()->route('manager.home');
        }
        else{
            return redirect()->route('manager.login')->with('fail','Incorrect Credentials');
        }

    }
    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
