<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Request;

class RequestController extends Controller
{
    public function allExamsDepartment()
    {

        $requests= Request::with('get_student')->  where([
            ['status','0'],
            ['requests.type','=','وثيقة ترفع']
        ])->orWhere([
            ['status','0'],
            ['requests.type','=','اشعار تخرج']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','ترتيب نجاح']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','حياة جامعية']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','طلب سكن']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','وضع دراسي']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','كشف علامات']])->get();
        return view('Exams Dashboard.Request.all',compact('requests'));
    }
    public function allAffairsDepartment()
    {
        $requests= Request::with('get_student')->  where([
            ['status','0'],
            ['requests.type','=','وثيقة تسجيل']
        ])->orWhere([
            ['status','0'],
            ['requests.type','=','وثيقة دوام']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','بطاقة جامعية']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','طبق الأصل عن مصدقة النخرج']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','وثيقة تثبيت موازي للأشقاء']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','حياة جامعية']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','طلب سكن']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','وضع دراسي']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','مصدقة تخرج']])
            ->orWhere([
                ['status','0'],
                ['requests.type','=','إحالة لتنظيم ضبط شرطة']])->get();
        return view('Affairs Dashboard.Request.all',compact('requests'));
    }
    public function confirmExamsDepartment($id)
    {
        $request=Request::where('id','=',$id)->first();
        $request->status=1;
        $request->save();
        return redirect('/exams/document-requests/all');

    }
    public function confirmAffairsDepartment($id)
    {
        $request=Request::where('id','=',$id)->first();
        $request->status=1;
        $request->save();
        return redirect('/affairs/document-requests/all');

    }
public function detailsExamsDepartment($id){


    $request=Request::with(['get_student','get_student.get_uni_info'])->where('requests.id','=',$id)->get();
    return view('Exams Dashboard.Request.details',compact('request'));
}
    public function detailsAffairsDepartment($id){
        $request=Request::with(['get_student','get_student.get_uni_info'])->where('requests.id','=',$id)->get();
        return view('Affairs Dashboard.Request.details',compact('request'));
    }
}
