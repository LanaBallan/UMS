<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Request;

class RequestController extends Controller
{
    public function all()
    {
        $requests= Request::with('get_student')->where('status','0')->get();
        //return $requests;
        return view('Exams Dashboard.Request.all',compact('requests'));
    }
    public function confirm($id)
    {
        $request=Request::where('id','=',$id)->first();
        $request->status=1;
        $request->save();

        return redirect('/exams/document-requests/all');

    }
public function details($id){
    $request=Request::with(['get_student','get_student.get_uni_info'])->where('requests.id','=',$id)->get();
  // return $request;
    return view('Exams Dashboard.Request.details',compact('request'));
}
}


//[{"id":1,"type":"\u0648\u062b\u064a\u0642\u0629 \u062a\u0631\u0641\u0639","status":0,"student_id":1,
//    "get_student":{"id":1,"f_name":"\u0644\u0627\u0646\u0627","l_name":"\u0628\u0644\u0627\u0646","email":"lanaballan@student.sy","phone":995846358,
//        "get_uni_info":[{"id":1,"student_id":1,"year":2022,"current_year":1,"total_failed_year":0,"status":"\u0646\u0627\u062c\u062d","specialization":"\u0639\u0644\u0648\u0645 \u0627\u0633\u0627\u0633\u064a\u0629"}]}}]
