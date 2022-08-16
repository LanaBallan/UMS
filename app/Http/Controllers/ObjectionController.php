<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mark;
use App\Models\Notification;
use App\Models\ObjectionReq;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class ObjectionController extends Controller
{
   public function allPrac()
   {
       $objections=ObjectionReq::where('type','practical')
           ->join('students','students.id','=','objection_reqs.student_id')
           ->join('subjects','subjects.id','=','objection_reqs.subject_id')
           ->select('students.id as studentId','students.f_name','students.l_name',
               'subjects.name','objection_reqs.id as objId','objection_reqs.created_at')
           ->get();
       return view('Exams Dashboard.Objection.allPrac',compact('objections'));
   }
   public function allTheo()
   {
       $objections=ObjectionReq::where('type','theoretical')
           ->join('students','students.id','=','objection_reqs.student_id')
           ->join('subjects','subjects.id','=','objection_reqs.subject_id')
           ->select('students.id as studentId','students.f_name','students.l_name',
               'subjects.name','objection_reqs.id as objId','objection_reqs.created_at')
           ->get();
       return view('Exams Dashboard.Objection.allTheo',compact('objections'));
   }
   public function details($id)
   {
       $objection=ObjectionReq::where('id',$id)->first();
      $mark=Mark::where('student_id',$objection->student_id)
          ->where('subject_id',$objection->subject_id)
          ->join('subjects','subjects.id','=','marks.subject_id')
          ->first();
       return view('Exams Dashboard.Objection.details',compact('objection','mark'));
   }
   public function delete($id)
   {
       $objection=ObjectionReq::where('id',$id)->first();
       $subject=Subject::where('id',$objection->subject_id)->first();
       if($objection->type=='practical')
       {
           $re=1;
       }
       else
       {
           $re=0;
       }
       $student=Student::where('id',$objection->student_id)->first();
       $student->point=$student->point+2000;
       $student->save();
       $notification=new Notification;
       $notification->student_id=$objection->student_id;
       $notification->text='لم يتم الاستفادة من طلب الاعتراض المقدم في مادة '.$subject->name;
       $notification->read=0;
       $notification->save();
       $objection->delete();
       if($re==1)
       {
           return redirect('/exams/objection/prac/all');
       }
       else
       {
           return redirect('/exams/objection/theo/all');
       }

   }
}
