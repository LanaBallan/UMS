<?php

namespace App\Http\Controllers;


use App\Models\Student;
use App\Models\Uni_info;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function add()
    {
        return view('Affairs Dashboard.Student.add');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validation(Request $request)
    {

       return Validator::make($request->all(),[
           'f_name' => ['required', 'string', 'max:255'],
           'l_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string','ends_with:@student.sy', ' max:255', 'unique:students'],
            'password' => ['required','string','min:8','confirmed'],
            'photo' => ['required']
        ]);


    }
    protected function store(Request $request)
    {
         $validator =$this->validation($request);



         if(!$validator->fails())
         {
             $uniInfo=new Uni_info;
             $data = $request->input();
             $imageName = rand().time().'.'.$request->photo->getClientOriginalExtension();
             $request->photo->move(public_path('upload'), $imageName);
             $student=new Student;
             $student->f_name=$data['f_name'];
             $student->l_name=$data['l_name'];
             $student->phone=$data['phone'];
             $student->email=$data['email'];
             $student->password = Hash::make($data['password']);
             $student->photo=$imageName;
             $student->save();
             $uniInfo->student_id=$student->id;
             $uniInfo->year=Carbon::now()->year;
             $uniInfo->current_year=1;
             $uniInfo->total_failed_year=0;
             $uniInfo->status='ناجح';
             $uniInfo->specialization='علوم اساسية';
             $uniInfo->save();
             return redirect('/affairs/student/all');
         }
         else {
             return redirect('/affairs/student/add')

                 ->withErrors($validator)

                 ->withInput();
         }

    }
    public function all ()
    {
        $students=Student::get();

      return view('Affairs Dashboard.Student.all',compact('students'));
    }
    public function delete($id){
        $student = Student::find($id);
        $student->delete();
        return back();
    }

}
