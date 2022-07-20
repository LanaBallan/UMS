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
        'acquittal_from_the_university',
        'acquittal_from_housing',
        'Clearance_of_credit_of_credit',
        'donate_blood',
        'Delivering financial',
        'photo_card',
        'photo_id',
        'arrived_registration',
        'current_year'
    ];
    public function get_student(){

        return $this->belongsTo('App\Models\Student','student_id','id');

    }
}
