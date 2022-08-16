<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Open;
use App\Models\RePractical;
use Illuminate\Http\Request;

class RePracController extends Controller
{
   public function manage()
   {

       return view('Exams Dashboard.RePrac.manage');
   }
   public function update(Request $request)
   {
       $open=Open::where('id',1)->first();
       if($request->manage==1)
       {
           $open->status=1;
       }
       else
       {
           $open->status=0;
           $reprac=RePractical::get();
           foreach ($reprac as $one)
           {
               $one->delete();
           }
       }
       $open->save();
       return redirect()->back()->with('Success','تم تعديل الحالة');
   }
   public function all()
   {
       $reprac=RePractical::join('students','students.id','=','re_practicals.student_id')
       ->join('subjects','subjects.id','=','re_practicals.subject_id')
        ->select('students.f_name','students.l_name','students.id as studentId','subjects.name','re_practicals.created_at as date')
       ->get();
       return view('Exams Dashboard.RePrac.all',compact('reprac'));
   }
}
