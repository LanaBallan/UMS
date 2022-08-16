<?php

namespace App\Http\Controllers;


use App\Exports\ClassesExport;
use App\Exports\StudentExport;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Uni_info;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

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
    public function examsSearch(Request $request)
{
    if (preg_match('~[0-9]+~', $request->key))
    {

        $student =Student::where('students.id',$request->key)
            ->join('uni_infos', 'students.id', '=', 'uni_infos.student_id')
            ->orderBy('uni_infos.created_at', 'DESC')
            ->first();
        $marks=Mark::where('student_id',$request->key)
            ->where('status','رسوب')->count();

    }
    else {
        $subject = Subject::where('subjects.name', $request->key)
            ->join('marks', 'subjects.id', '=', 'marks.subject_id')
            ->join('students', 'marks.student_id', '=', 'students.id')
            ->whereYear('marks.year', Carbon::now()->format('Y'))
            ->select('subjects.name as subjectName', 'students.f_name', 'students.l_name'
                , 'marks.student_id', 'marks.practical_mark', 'marks.theoretical_mark', 'marks.semester'
                , 'marks.total_mark', 'marks.status', 'marks.year', 'marks.id as markId')
            ->get();
        if (!$subject->isEmpty()) {

            return view('Exams Dashboard.Subject.search', compact('subject'));
        } else {
            $subject = Subject::where('subjects.name', $request->key)
                ->join('marks', 'subjects.id', '=', 'marks.subject_id')
                ->join('students', 'marks.student_id', '=', 'students.id')
                ->select('subjects.name as subjectName', 'students.f_name', 'students.l_name'
                    , 'marks.student_id', 'marks.practical_mark', 'marks.theoretical_mark', 'marks.semester'
                    , 'marks.total_mark', 'marks.status', 'marks.year', 'marks.id as markId')
                ->get();
            if (!$subject->isEmpty()) {

                return view('Exams Dashboard.Subject.noNewMarks');
            } else {
                $pieces = explode(" ", $request->key);
                if (!isset($pieces[1])) {
                    return view('Exams Dashboard.studentNotFound');
                } else {
                    $student = Student::where('students.f_name', $pieces[0])
                        ->where('students.l_name', $pieces[1])
                        ->join('uni_infos', 'students.id', '=', 'uni_infos.student_id')
                        ->orderBy('uni_infos.created_at', 'DESC')
                        ->first();

                    $marks = Mark::where('student_id', '=', $student->id)
                        ->where('status', 'رسوب')->count();

                }
            }


        }
    }
if($student !=null)
{
    return view('Exams Dashboard.studentSearch',compact('student','marks'));
}
  else
  {
      return view('Exams Dashboard.studentNotFound');
  }
}
public function affairsSearch(Request $request)
{
    if (preg_match('~[0-9]+~', $request->key)) {

        $student = Student::where('students.id', $request->key)
            ->join('uni_infos', 'students.id', '=', 'uni_infos.student_id')
            ->orderBy('uni_infos.created_at', 'DESC')
            ->first();
        $marks = Mark::where('student_id', $request->key)
            ->where('status', 'رسوب')->count();

    } else {
        $pieces = explode(" ", $request->key);
        if (!isset($pieces[1])) {
            return view('Affairs Dashboard.studentNotFound');
        } else {
            $student = Student::where('students.f_name', $pieces[0])
                ->where('students.l_name', $pieces[1])
                ->join('uni_infos', 'students.id', '=', 'uni_infos.student_id')
                ->orderBy('uni_infos.created_at', 'DESC')
                ->first();

            $marks = Mark::where('student_id', '=', $student->id)
                ->where('status', 'رسوب')->count();

        }
    }
    if($student !=null)
    {
        return view('Affairs Dashboard.studentSearch',compact('student','marks'));
    }
    else
    {
        return view('Affairs Dashboard.studentNotFound');
    }
}
public function examsLists()
{
    return view('Exams Dashboard.Student.lists');
}
    public function affairsLists()
    {
        return view('Affairs Dashboard.Student.lists');
    }
public function getLists(Request $request)
{
    return Excel::download(new StudentExport($request), 'students.xlsx');
}
public function classes()
{
    return view('Affairs Dashboard.Student.classes');
}
public function getClasses(Request $request)
{
    return Excel::download(new ClassesExport($request), 'classes.xlsx');
}
public function addUniInfo()
{
    return view('Affairs Dashboard.Student.editUniInfo');
}
    public function storeUniInfo(Request $request)
    {
        $data = $request->input();
        $uniInfoLast=Uni_info::where('student_id',$data['student_id'])  ->orderBy('uni_infos.created_at', 'DESC')
            ->first();
        $uniInfoLast->status=$data['status'];
        $uniInfo=new Uni_info;
        $uniInfo->student_id=$data['student_id'];
        $uniInfo->status=$data['status'];
        $uniInfo->yearly_avg=0;
        $uniInfo->total_avg=$uniInfoLast->total_avg;
        if($data['status']=='ناجح' || $data['status']=='منقول')
        {
            $uniInfo->current_year= $uniInfoLast->current_year+1;
            $uniInfo->total_failed_year=$uniInfoLast->total_failed_year;
        }
        else
        {
            $uniInfo->current_year= $uniInfoLast->current_year;
            $uniInfo->total_failed_year=$uniInfoLast->total_failed_year+1;
        }
        $uniInfo->year=Carbon::now()->year;
        $uniInfo->save();
        $uniInfoLast->save();
        return redirect()->back()->with('Success','تم حفظ السجل');
    }
    public function addPoints()
{
    return view('Affairs Dashboard.addPoints');
}
public function storePoints(Request $request)
{
    $data = $request->input();
    $student=Student::where('id',$data['student_id'])->first();
    $student->point= $student->point+$data['point'];
    $student->save();
    return redirect()->back()->with('Success','تم شحن النقاط');
}
public function nameSort()
{
    $students = Student::orderBy('students.f_name', 'ASC')
        ->orderBy('students.l_name', 'ASC')
        ->select('students.email','students.phone','students.l_name','students.f_name'
            ,'students.id as studentId')
        ->get();
    return view('Affairs Dashboard.Student.all',compact('students'));
}
public function avgSort()
{

    $students1 = Student::join('uni_infos', 'students.id', '=', 'uni_infos.student_id')
        ->orderBy('uni_infos.total_avg', 'DESC')
        ->select('students.email','students.phone','students.l_name','students.f_name'
            ,'students.id as studentId')
        ->get();
    $unique = $students1->unique('email');
    $students= $unique->values()->all();
    return view('Affairs Dashboard.Student.all',compact('students'));
}
}
