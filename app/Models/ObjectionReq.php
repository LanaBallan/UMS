<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ObjectionReq extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'objection_reqs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'status',
        'type',
        'new_mark',
        'student_id',
        'subject_id'
    ];
    public function get_mark(){

        return $this->belongsTo('App\Mark','mark_id','id');

    }
}
