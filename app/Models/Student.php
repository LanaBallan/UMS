<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Student extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'students';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'f_name',
        'l_name',
        'phone',
        'class',
        'password',
        'email',
        'point',
        'photo',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function get_uni_info(){
        return $this->hasMany('App\Models\Uni_info','student_id','id')->whereYear('created_at', '=', Carbon::now()->format('Y'));
    }
    public function get_request(){
        return $this->hasMany('App\Models\Request','student_id','id');
    }
public static function getStudents(Request $request)
{
    $records = DB::table('students')
        ->join('uni_infos', 'students.id', '=', 'uni_infos.student_id')
        ->where('uni_infos.current_year',$request->year)
        ->where('uni_infos.specialization',$request->specialization)
        ->select('uni_infos.status','uni_infos.specialization'
            ,'uni_infos.current_year','students.l_name','students.f_name'
            ,'students.id')
        ->get();
    return $records;
}
    public static function getClassesByName(Request $request)
    {
        $records = DB::table('students')
            ->join('uni_infos', 'students.id', '=', 'uni_infos.student_id')
            ->where('uni_infos.current_year',$request->year)
            ->where('uni_infos.specialization',$request->specialization)
            ->orderBy('students.f_name', 'ASC')
            ->orderBy('students.l_name', 'ASC')
            ->select('students.class','students.l_name','students.f_name'
                ,'students.id')
            ->get();
        return $records;
    }
public static function getClassesByAvg(Request $request)
{
        $records1 = DB::table('students')
        ->join('uni_infos', 'students.id', '=', 'uni_infos.student_id')
        ->where('uni_infos.current_year',$request->year)
        ->where('uni_infos.specialization',$request->specialization)
            ->orderBy('uni_infos.total_avg', 'DESC')
          ->select('students.class','students.l_name','students.f_name'
            ,'students.id')
        ->get();
    $students = $records1->unique('id');

    return $students;
}
}
