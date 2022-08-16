<?php

namespace App\Http\Controllers;

use App\Exports\MarkListsExport;
use App\Imports\MarksImport;
use App\Models\EditLog;
use App\Models\Notification;
use App\Models\ObjectionReq;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Mark;
use App\Models\Uni_info;
use Carbon\Carbon;
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
       $data = $request->input();
       if($data['mark_type']=='عملي')
       {
           $mark=new Mark;
           $mark->student_id=$data['student_id'];
           $mark->subject_id=$data['subject_id'];
           $mark->employee_id=Auth::guard('examsEmployee')->user()->id;
           $mark->practical_mark=$data['mark'];
           $mark->total_mark=$data['mark'];
           $mark->year=$data['year'];
           $mark->semester=$data['semester'];
           $mark->status='نجاح';
           $mark->confirmed=0;
           $mark->time_insert_parc=Carbon::now();
           $mark->save();
           return redirect()->back()->with('Success','تم حفظ العلامة');
       }
       else
       {
         $mark=Mark::where('student_id',$data['student_id'])
               ->where('subject_id',$data['subject_id'])
               ->first();
           $mark->year=$data['year'];
           $mark->semester=$data['semester'];
           $mark->theoretical_mark=$data['mark'];
           $mark->total_mark=$mark->practical_mark+$data['mark'];
           if($mark->total_mark>=60)
           {
               $mark->status='نجاح';
           }
           else
           {
               $mark->status='رسوب';
           }
            $mark->save();
           return redirect()->back()->with('Success','تم حفظ العلامة');
       }
   }
   public function checkSubjects()
   {
       $subject=Subject::join('marks', 'subjects.id', '=', 'marks.subject_id')
           ->where('marks.confirmed',0)
           ->where('marks.employee_id','!=',Auth::guard('examsEmployee')->user()->id)
           ->select('subjects.name as subjectName','subjects.id as subjectId' )
           ->get();
       $unique = $subject->unique('subjectName');
       $subjects= $unique->values()->all();
       return view('Exams Dashboard.Mark.checkSubjects',compact('subjects'));
   }
   public function checkMarks($id)
   {
       $marks=Mark::join('students', 'students.id', '=', 'marks.student_id')
           ->join('subjects', 'subjects.id', '=', 'marks.subject_id')
       ->where('marks.subject_id',$id)
           ->where('marks.confirmed',0)
           ->select('students.id as studentId','students.f_name','students.l_name','marks.id as markId','marks.practical_mark'
           ,'marks.theoretical_mark','marks.total_mark','marks.id as markId','subjects.name as subjectName')
           ->get();
      // return $marks;
       return view('Exams Dashboard.Mark.checkMarks',compact('marks'));
   }
public function confirm(Request $request)
{
    foreach($request->id as $one)
    {
        $mark=Mark::where('id',$one)->first();
        $mark->confirmed=1;
        $mark->save();
    }
    foreach ($request->studentIds as $one)
    {
        $uni_info=Uni_info::where('student_id',$one)->orderBy('created_at', 'DESC')
            ->first();
        $marks=Mark::where('student_id',$one)->where('status','نجاح')->where('confirmed',1)->get();
        $num_marks=count($marks);
        $summarks=Mark::where('student_id',$one)->where('status','نجاح')->where('confirmed',1)->sum('total_mark');
        $uni_info->yearly_avg=$summarks/$num_marks;
        $total_yearly_avg=Uni_info::where('student_id',$one)->sum('yearly_avg');
        $uni_info->total_avg=$total_yearly_avg/$uni_info->current_year;
        $uni_info->save();
    }
    return redirect('/exams/mark/check/subjects')->with('Success','تم تأكيد العلامات');

}

    public function edit()
    {
        $subjects=Subject::all();
        return view('Manager Dashboard.Mark.edit',compact('subjects'));
    }

    public function update(Request $request){
        $data = $request->input();
        $mark=Mark::where('subject_id',$data['subject_id'])
            ->where('student_id',$data['student_id'])
            ->first();
            if($data['mark_type']=='عملي')
            {
                $mark->practical_mark=$data['mark'];
                $mark->total_mark=$mark->theoretical_mark+$data['mark'];
            }else
            {
                $mark->theoretical_mark=$data['mark'];
                $mark->total_mark=$mark->practical_mark+$data['mark'];
            }

        if($mark->total_mark>=60)
        {
            $mark->status='نجاح';
        }
        else{
            $mark->status='رسوب';
        }

        $edit=new EditLog;
        $edit->mark_id=$mark->id;
        $edit->employee_id=Auth::user()->id;
        $edit->date=Carbon::now();
        $imageName = rand().time().'.'.$request->edit_img->getClientOriginalExtension();
        $request->edit_img->move(public_path('upload'), $imageName);
        $edit->edit_pic=$imageName;
        $edit->save();
        $mark->save();
        $uni_info=Uni_info::where('student_id',$data['student_id'])->orderBy('created_at', 'DESC')
            ->first();
        $marks=Mark::where('student_id',$data['student_id'])->where('status','نجاح')->where('confirmed',1)->get();
        $num_marks=count($marks);
        if($num_marks==0)
        {
            $uni_info->yearly_avg=0;
        }
        else
        {
            $summarks=Mark::where('student_id',$data['student_id'])->where('status','نجاح')->where('confirmed',1)->sum('total_mark');
            $uni_info->yearly_avg=$summarks/$num_marks;
        }
        $total_yearly_avg=Uni_info::where('student_id',$data['student_id'])->sum('yearly_avg');
        $uni_info->total_avg=$total_yearly_avg/$uni_info->current_year;
        $uni_info->save();
        return redirect()->back()->with('Success','تم تعديل العلامة');
    }
    public function editLog()
    {
        $edits1=EditLog::join('exams_employees','exams_employees.id','=','edit_logs.employee_id')
            ->join('marks', 'marks.id', '=', 'edit_logs.mark_id')
            ->join('students', 'students.id', '=', 'marks.student_id')
            ->join('subjects', 'subjects.id', '=', 'marks.subject_id')
            ->select('students.f_name as studentFname','students.l_name as studentLname','students.id as studentId'
                ,'subjects.name as subjectName','marks.total_mark','marks.theoretical_mark'
                ,'marks.practical_mark',
                'edit_logs.date','edit_logs.edit_pic','exams_employees.f_name','exams_employees.l_name')
            ->get();
        $edits2=EditLog::join('users','users.id','=','edit_logs.employee_id')
            ->join('marks', 'marks.id', '=', 'edit_logs.mark_id')
            ->join('students', 'students.id', '=', 'marks.student_id')
            ->join('subjects', 'subjects.id', '=', 'marks.subject_id')
            ->select('students.f_name as studentFname','students.l_name as studentLname','students.id as studentId'
                ,'subjects.name as subjectName','marks.total_mark','marks.theoretical_mark'
                ,'marks.practical_mark',
                'edit_logs.date','edit_logs.edit_pic','users.f_name','users.l_name')
            ->get();

         return view('Manager Dashboard.Mark.editLog',compact('edits1','edits2'));
    }
    public function examsGetStudentMarks($id)
    {
        $marks= Mark::where('student_id',$id)->with('get_subject','get_student')->get();
        //return $marks;
        return view('Exams Dashboard.Mark.studentMarks',compact('marks'));
    }
    public function affairsGetStudentMarks($id)
    {
        $marks= Mark::where('student_id',$id)->with('get_subject','get_student')->get();
        //return $marks;
        return view('Affairs Dashboard.Student.studentMarks',compact('marks'));
    }
    public function list()
    {
        $subjects=Subject::get();
        return view('Exams Dashboard.Mark.list',compact('subjects'));
    }
    public function getMarkLists(Request $request)
    {
        return Excel::download(new MarkListsExport($request), 'marks.xlsx');
    }
public function objUpdate($id,Request $request)
{
    $objection=ObjectionReq::where('id',$id)->first();
    $subject=Subject::where('id',$objection->subject_id)->first();
    $mark=Mark::where('student_id',$objection->student_id)
        ->where('subject_id',$objection->subject_id)
        ->first();
    if($objection->type=='practical')
    {
        $mark->practical_mark=$request->mark;
        $mark->total_mark=$request->mark+$mark->theoretical_mark;
    }
    else
    {
        $mark->theoretical_mark=$request->mark;
        $mark->total_mark=$mark->practical_mark+$request->mark;
    }

    if($mark->total_mark>=60)
    {
        $mark->status='نجاح';
    }
    else{
        $mark->status='رسوب';
    }
    $edit=new EditLog;
    $edit->mark_id=$mark->id;
    $edit->employee_id=Auth::guard('examsEmployee')->user()->id;
    $edit->date=Carbon::now();
    $imageName = rand().time().'.'.$request->edit_img->getClientOriginalExtension();
    $request->edit_img->move(public_path('upload'), $imageName);
    $edit->edit_pic=$imageName;
    $edit->save();
    $notification=new Notification;
    $notification->student_id=$objection->student_id;
    $notification->text='تم الاستفادة من طلب الاعتراض المقدم في مادة '.$subject->name.' العلامة الجديدة: '.$request->mark;
    $notification->read=0;
    $notification->save();
    $mark->save();
    $uni_info=Uni_info::where('student_id',$objection->student_id)->orderBy('created_at', 'DESC')
        ->first();
    $marks=Mark::where('student_id',$objection->student_id)->where('status','نجاح')->where('confirmed',1)->get();
    $num_marks=count($marks);
    if( $num_marks==0)
    {
        $uni_info->yearly_avg=0;
    }
    else
    {
        $summarks=Mark::where('student_id',$objection->student_id)->where('status','نجاح')->where('confirmed',1)->sum('total_mark');
        $uni_info->yearly_avg=$summarks/$num_marks;
    }
    $total_yearly_avg=Uni_info::where('student_id',$objection->student_id)->sum('yearly_avg');
    $uni_info->total_avg=$total_yearly_avg/$uni_info->current_year;
    $uni_info->save();
    if($objection->type=='practical')
    {
        $re=1;
    }
    else
    {
        $re=0;
    }
    $objection->delete();
    if($re==1)
    {
        return redirect('/exams/objection/prac/all')->with('Success','تم تعديل العلامة');
    }
    else
    {
        return redirect('/exams/objection/theo/all')->with('Success','تم تعديل العلامة');
    }


}
}
