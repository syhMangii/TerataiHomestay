<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreHistory extends Model
{
    use HasFactory;  

    protected $fillable = ['score', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function checkIns()
    {
        return $this->hasMany(CheckIn::class);
    }

    public function streaks()
    {
        return $this->hasMany(Streak::class);
    }
}
