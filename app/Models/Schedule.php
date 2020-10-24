<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public const REQUESTED = 'REQUESTED';
    public const CONFIRMED = 'CONFIRMED';
    public const REFUSED = 'REFUSED';
    public const CANCELED = 'CANCELED';

    protected $fillable = [
        'client_name',
        'client_email',
        'client_phone',
        'subject',
        'meeting_agenda',
        'start_date',
        'end_date',
        'requester_id',
        'status'   
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    
    public function requester(){
        return $this->belongsTo('App\Models\User', 'requester_id');
    }

    public function participants(){
        return $this->hasMany('App\Models\Participant');
    }

    public function users(){
        return $this->hasManyThrough('App\Models\User', 'App\Models\Participant');
    }


}
