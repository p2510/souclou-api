<?php

namespace App\Models;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timetable extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id'
    ];

    /**
     * Get the user associated with the Timetable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the schedules for the Timetable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'timetable_id', 'id');
    }
}