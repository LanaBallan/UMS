<?php

namespace App\Http\Controllers;

use App\Imports\MarksImport;
use App\Models\Subject;
use App\Models\Mark;
use App\Models\Uni_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class MarkController extends Controller
{
   public function add()
   {
       $subjects=Subject::get();
       return view('Exams Dashboard.Mark.add',compact('subjects'));
   }
    public function store(Request $request)
    {
        Excel::import(new MarksImport($request), $request->file);
        return redirect('/exams/mark/all');
    }
    public function all()
    {
        $marks= Mark::with('get_subject','get_student')->get();
        return view('Exams Dashboard.Mark.all',compact('marks'));
    }
    public function delete($id){
        $mark = Mark::find($id);
        $marks=Mark::where('student_id',$mark->student_id)->where('status','رسوب')->get();
        $failed_marks=count($marks);
        $uni_info=Uni_info::where('student_id',$mark->student_id)->first();
        if(($failed_marks-1)>4) {
            $uni_info->status = 'راسب';
            $uni_info->save();
        }
        else if(($failed_marks-1)==0)
        {
            $uni_info->status = 'ناجح';
            $uni_info->save();
        }
        else if(($failed_marks-1)>0&&($failed_marks-1)<=4)
        {
            $uni_info->status = 'منقول';
            $uni_info->save();
        }
        $mark->delete();
        return back();
    }
    public function edit($id){
        $mark = Mark::find($id);
        $subjects=Subject::get();
        return view('Exams Dashboard.Mark.edit',compact( 'mark','subjects'));


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
        $marks=Mark::where('student_id',$data['student_id'])->where('status','رسوب')->get();
        $failed_marks=count($marks);
        $uni_info=Uni_info::where('student_id',$data['student_id'])->first();
        if($failed_marks>4) {
            $uni_info->status = 'راسب';
            $uni_info->save();
        }
        else if($failed_marks==0)
        {
            $uni_info->status = 'ناجح';
            $uni_info->save();
        }
        else if($failed_marks>0&&$failed_marks<=4)
        {
            $uni_info->status = 'منقول';
            $uni_info->save();
        }
        return redirect('/exams/mark/all');
    }
}
