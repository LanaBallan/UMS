<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subject extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'subjects';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'year',
        'specialization',
        'max_practical',
        'max_theoretical',
    ];

    protected $hidden = [];

    public function get_mark(){
        return $this->hasMany('App\Models\Mark','subject_id','id');
    }
}
