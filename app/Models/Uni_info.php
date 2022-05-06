<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uni_info extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'uni_infos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'student_id',
        'year',
        'current_year',
        'total_failed_year',
        'status',
        'specialization',
        'created_at',
    ];

    protected $hidden = [];

    public function get_student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }
}
