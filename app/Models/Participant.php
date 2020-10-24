<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'schedule_id',
        'confirmation_date',
        'accepted'
    ];

    protected $casts = [
        'confirmation_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'accepted' => 'boolean'
    ];

    
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function schedule(){
        return $this->belongsTo('App\Models\Schedule', 'schedule_id');
    }

    public function schedules(){
        return $this->hasManyThrough('App\Models\Schedule', 'App\Models\Participant');
    }
}
