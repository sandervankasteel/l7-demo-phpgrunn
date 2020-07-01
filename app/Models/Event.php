<?php

namespace App\Models;

use App\Casts\Address;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $fillable = [
        'description',
        'title',
    ];

    protected $dates = [
        'timestamp'
    ];

    protected $casts = [
        'address' => Address::class
    ];

    public function scopeFuture(Builder $query)
    {
        return $query->where('timestamp', '>=', Carbon::now());
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function attendees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_attending')
            ->withTimestamps();
    }

    public function organizer(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'organizer_id');
    }
}
