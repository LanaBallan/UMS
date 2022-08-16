<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditLog extends Model
{
    use HasFactory;
    protected $table = 'edit_logs';
    protected $fillable = [

        'mark_id',
        'employee_id',
        'date',
        'edit_pic'
    ];
}
