<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RePractical extends Model
{
    use HasFactory, Notifiable;

    protected $table = 're_practicals';
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
        'created_at',
        'updated_at'
    ];
    protected $hidden = [];
}
