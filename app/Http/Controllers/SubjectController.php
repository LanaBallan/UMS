<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
   public function add()
   {
       return view('Subject.add');
   }
   public function store(Request $request)
   {
       $data = $request->input();
        $subject=new Subject;
        $subject->name= $data['name'];
       $subject->year= $data['year'];
       $subject->specialization= $data['specialization'];
       $subject->max_practical=$data['max_practical'];
       $subject->max_theoretical=$data['max_theoretical'];
       $subject->save();
       return redirect('/subject/all');

   }
   public function all()
{
    $subjects= Subject::all();

    return view('Subject.all',compact('subjects'));
}
    public function delete($id){
       $subject = Subject::find($id);
        $subject->delete();
        return back();
    }

    public function edit($id){
        $subject = Subject::find($id);
        return view('Subject.edit',compact( 'subject'));


    }

    public function update($id, Request $request){
        $data = $request->input();
        $subject = Subject::find($id);
        $subject->name= $data['name'];
        $subject->year= $data['year'];
        $subject->specialization= $data['specialization'];
        $subject->max_practical=$data['max_practical'];
        $subject->max_theoretical=$data['max_theoretical'];
        $subject->save();
        return redirect('/subject/all');
    }
}
