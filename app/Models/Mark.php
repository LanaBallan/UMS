<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Mark extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'marks';
    protected $fillable = [
        'id',
        'student_id',
        'subject_id',
        'employee_id',
        'practical_mark',
        'theoretical_mark',
        'total_mark',
        'year',
        'semester',
        'status',
        'confirmed',
        'time_insert_parc',
        'time_insert_theo',
    ];

    protected $hidden = [];


    public function get_student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }
    public function get_subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }
    public function get_objection_req(){
        return $this->hasMany('App\Models\ObjectionReq','mark_id','id');
    }
    public static function getMarks(Request $request)
    {
        $records = DB::table('marks')
            ->join('subjects', 'subjects.id', '=', 'marks.subject_id')
            ->join('students', 'students.id', '=', 'marks.student_id')
            ->join('uni_infos', 'students.id', '=', 'uni_infos.student_id')
            ->where('marks.subject_id',$request->subject_id)
            ->where('subjects.specialization',$request->specialization)
            ->where('marks.year',$request->year)
            ->where('marks.semester',$request->semester)
            ->where('marks.confirmed',1)
            ->select('students.id','students.f_name','students.l_name','marks.practical_mark'
        ,'marks.theoretical_mark','marks.total_mark')
            ->get();
        return $records;
    }
}
