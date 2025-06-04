<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'role',
        'password',
        'school_id',
        'clinic_id',
        'is_read',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function quitDates()
    {
        return $this->hasMany(QuitDate::class);
    }

    public function scoreHistories()
    {
        return $this->hasMany(ScoreHistory::class);
    }

    public function checkIns()
    {
        return $this->hasManyThrough(CheckIn::class, ScoreHistory::class);
    }

    public function streaks()
    {
        return $this->hasManyThrough(Streak::class, ScoreHistory::class);
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class)->withTimestamps();
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
