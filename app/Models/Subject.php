<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    protected $hidden = [];

    public function get_mark(){
        return $this->hasMany('App\Models\Mark','subject_id','id');
    }
}
