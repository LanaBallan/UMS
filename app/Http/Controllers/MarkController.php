<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Mark;
use Illuminate\Http\Request;


class MarkController extends Controller
{
   public function add()
   {
       $subjects=Subject::get();
       return view('Mark.add',compact('subjects'));
   }
    public function store(Request $request)
    {
        $data = $request->input();
        $mark=new Mark;
        $mark->student_id= $data['student_id'];
        $mark->subject_id= $data['subject_id'];
        $mark->practical_mark= $data['practical_mark'];
        $mark->theoretical_mark=$data['theoretical_mark'];
        $mark->total_mark=$data['practical_mark']+$data['theoretical_mark'];
        $mark->year=$data['year'];
        $mark->semester=$data['semester'];
        if( $mark->total_mark>=60)
        {
            $mark->status='نجاح';
        }
        else{
            $mark->status='رسوب';
        }
        $mark->confirmed=false;
        $mark->save();
        return redirect('/mark/all');

    }
    public function all()
    {
        $marks= Mark::with('get_subject','get_student')->get();
        return view('Mark.all',compact('marks'));
    }
    public function delete($id){
        $mark = Mark::find($id);
        $mark->delete();
        return back();
    }
    public function edit($id){
        $mark = Mark::find($id);
        $subjects=Subject::get();
        return view('Mark.edit',compact( 'mark','subjects'));


    }
    public function update($id, Request $request){
        $data = $request->input();
        $mark = Mark::find($id);
        $mark->student_id= $data['student_id'];
        $mark->subject_id= $data['subject_id'];
        $mark->practical_mark= $data['practical_mark'];
        $mark->theoretical_mark=$data['theoretical_mark'];
        $mark->total_mark=$data['practical_mark']+$data['theoretical_mark'];
        $mark->year=$data['year'];
        $mark->semester=$data['semester'];
        if( $mark->total_mark>=60)
        {
            $mark->status='نجاح';
        }
        else{
            $mark->status='رسوب';
        }
        $mark->save();
        return redirect('/mark/all');
    }
}
