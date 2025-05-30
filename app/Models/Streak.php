<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Streak extends Model
{
    use HasFactory;
    
    protected $fillable = ['score_history_id', 'streak_count'];

    public function scoreHistory()
    {
        return $this->belongsTo(ScoreHistory::class);
    }
}
