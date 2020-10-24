<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

     protected $fillable = [
        'name',
        'email',
        'password',
    ];
 
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function participants(){
        return $this->hasMany('App\Models\Participant');
    }

    public function schedules(){
        return $this->participants->map(function($participant) { return $participant->schedule;});
    }


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return $this->toArray();
    }
}
