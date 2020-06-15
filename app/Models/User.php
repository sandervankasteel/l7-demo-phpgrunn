<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'name',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function attendingEvents(): HasManyThrough
    {
        return $this->hasManyThrough(Event::class, 'users_attending')
            ->where('events.timestamp','>=', Carbon::now());
    }

    public function attendedEvents(): HasManyThrough
    {
        return $this->hasManyThrough(Event::class, 'users_attending')
            ->where('events.timestamp','<=', Carbon::now());
    }
}
