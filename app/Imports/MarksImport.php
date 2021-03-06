<?php

namespace App\Imports;

use App\Models\Mark;
use App\Models\Uni_info;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;

class MarksImport implements ToModel
{

    /**
     * @var mixed
     */
    private $mark_type;
    /**
     * @var mixed
     */
    private $semester;
    /**
     * @var mixed
     */
    private $year;
    /**
     * @var mixed
     */
    private $subject_id;

    public function __construct(Request $request)
    {
$this->mark_type=$request->mark_type;
$this->semester=$request->semester;
$this->year=$request->year;
$this->subject_id=$request->subject_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $mytime = Carbon::now();
if($this->mark_type=='عملي')
{
        return new Mark([
            "student_id" => $row[0],
            "practical_mark" => $row[1],
            "subject_id" => $this->subject_id,
            "total_mark" => $row[1],
            "semester" => $this->semester,
            "year" => $this->year,
            "status" => 'نجاح',
            "time_insert_parc" => $mytime->toDateString(),
        ]);
}
else
{
$mark =Mark::where('student_id',$row[0])->where('subject_id',$this->subject_id)->first();
if($mark!=null)
{
    $mark->theoretical_mark=$row[1];
    $mark->time_insert_theo = $mytime->toDateString();
    $mark->semester = $this->semester;
    $mark->total_mark=$mark->theoretical_mark+ $mark->practical_mark;
    if($mark->total_mark>=60)
    {
        $mark->status='نجاح';
    }
    else
    {
        $mark->status='رسوب';
    }
    $mark->save();
    $marks=Mark::where('student_id',$row[0])->where('status','رسوب')->get();
    $failed_marks=count($marks);
    $uni_info=Uni_info::where('student_id',$row[0])->first();
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

    return $mark;
}
     else
         return null;
    }
    }
}
