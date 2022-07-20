<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mark extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'marks';
    protected $fillable = [
        'id',
        'student_id',
        'subject_id',
        'practical_mark',
        'theoretical_mark',
        'total_mark',
        'year',
        'semester',
        'status',
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
}
