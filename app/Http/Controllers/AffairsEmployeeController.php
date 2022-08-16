<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffairsEmployeeController extends Controller
{
    public function logout()
    {
        Auth::guard('affairsEmployee')->logout();
        return redirect()->route('affairs.login');
    }
    public function home()
    {
        $requests= \App\Models\Request::with('get_student')->where([
            ['requests.status','1'],
            ['requests.type','=','وثيقة تسجيل']
        ])->orWhere([
            ['requests.status','1'],
            ['requests.type','=','وثيقة دوام']])

            ->orWhere([
                ['requests.status','1'],
                ['requests.type','=','مصدقة تخرج']])

            ->orWhere([
                ['requests.status','1'],
                ['requests.type','=','حياة جامعية']])
            ->get();

        return view('Affairs Dashboard.Request.all',compact('requests'));
    }
}
