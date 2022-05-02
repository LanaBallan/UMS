<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
   public function add()
   {
       return view('subject.add');
   }
   public function insert(Request $request)
   {
        $subject=new Subject;
        $subject->name=$request->name;
       $subject->year=$request->year;
       $subject->specialization=$request->specialization;
   }
}
