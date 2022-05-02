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
       $data = $request->input();
        $subject=new Subject;
        $subject->name= $data['name'];
       $subject->year= $data['year'];
       $subject->specialization= $data['specialization'];
       $subject->save();

   }
}
