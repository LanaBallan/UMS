<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Request extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'requests';
    protected $fillable = [

         'id',
        'type',
        'status',
        'student_id',

    ];
    public function get_student(){

        return $this->belongsTo('App\Student','student_id','id');

    }
}
