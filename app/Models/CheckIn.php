<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
   use HasFactory;

    protected $fillable = ['score_history_id', 'action', 'is_continous'];

    // In app/Models/CheckIn.php
protected $casts = [
    'is_continous' => 'boolean',
];


    public function scoreHistory()
    {
        return $this->belongsTo(ScoreHistory::class);
    }
}
