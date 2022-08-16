<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Request;
use App\Models\Student;
use Carbon\Carbon;

class RequestController extends Controller
{
    public function allExamsDepartment()
    {
        $requests= Request::with('get_student')->  where([
            ['requests.status','1'],
            ['requests.type','=','وثيقة ترفع']])
            ->orWhere([
                ['requests.status','1'],
                ['requests.type','=','كشف علامات']])->get();
        return view('Exams Dashboard.Request.all',compact('requests'));
    }
    public function allAffairsDepartment()
    {
        $requests= Request::with('get_student')->where([
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
    public function confirmExamsDepartment($id)
    {
        $request=Request::where('id','=',$id)->first();
        $notification=new Notification;
        $notification->student_id=$request->student_id;
        $notification->text=$request->type .': تم تأكيد جهوزية طلبك, يرجى استلام الورقة من ديوان الطلاب';
        $notification->read=0;
        $notification->save();
        $request->delete();
        return redirect('/exams/document-requests/all');
    }
    public function confirmAffairsDepartment($id)
    {
        $request=Request::where('id','=',$id)->first();
        $notification=new Notification;
        $notification->student_id=$request->student_id;
        $notification->text=$request->type .': تم تأكيد جهوزية طلبك, يرجى استلام الورقة من ديوان الطلاب';
        $notification->read=0;
        $notification->save();
        if($request->type=='وثيقة تسجيل'||$request->type=='وثيقة دوام')
        {
            $request->status=0;
            $request->save();
        }
        else
        {
            $request->delete();
        }

        return redirect('/affairs/document-requests/all');

    }
public function detailsExamsDepartment($id){
    $request=Request::where('requests.id','=',$id)->
    join('students', 'students.id', '=', 'requests.student_id')
        ->join('uni_infos', 'students.id', '=', 'uni_infos.student_id')
        ->orderBy('uni_infos.created_at', 'DESC')
        ->select('students.f_name','students.l_name','students.id as studentId',
            'uni_infos.current_year','uni_infos.total_failed_year'
            ,'uni_infos.status','uni_infos.specialization','requests.id as requestId'
            ,'requests.created_at as date','requests.type')
        ->first();
    return view('Exams Dashboard.Request.details',compact('request'));
}
    public function rejectExamsDepartment($id)
    {
        $request=Request::where('id',$id)->first();
        $notification=new Notification;
        $notification->student_id=$request->student_id;
        $notification->text=$request->type .': تم رفض الطلب, يرجى التحقق من البيانات المدخلة وإعادة الطلب';
        $notification->read=0;
        $notification->save();
        if($request->type=='كشف علامات')
        {
            $student=Student::where('id',$request->student_id)->first();
            $student->point=$student->point+3000;
            $student->save();
        }
        $request->delete();
        return redirect('/exams/document-requests/all');
    }
    public function detailsAffairsDepartment($id){
        $request=Request::where('requests.id','=',$id)->
        join('students', 'students.id', '=', 'requests.student_id')
            ->join('uni_infos', 'students.id', '=', 'uni_infos.student_id')
            ->orderBy('uni_infos.created_at', 'DESC')
            ->select('students.f_name','students.l_name','students.id as studentId',
            'uni_infos.current_year','uni_infos.total_failed_year'
            ,'uni_infos.status','uni_infos.specialization','requests.id as requestId'
                ,'requests.created_at as date','requests.type')
            ->first();
        return view('Affairs Dashboard.Request.details',compact('request'));
    }
    public function rejectAffairsDepartment($id)
    {
        $request=Request::where('id',$id)->first();
        $notification=new Notification;
        $notification->student_id=$request->student_id;
        $notification->text=$request->type .': تم رفض الطلب, يرجى التحقق من البيانات المدخلة وإعادة الطلب';
        $notification->read=0;
        $notification->save();
        $request->delete();
        return redirect('/affairs/document-requests/all');
    }
}
