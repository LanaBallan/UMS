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
        'new-mark',
        'mark-id'
    ];
    public function get_mark(){

        return $this->belongsTo('App\Mark','mark_id','id');

    }
}
