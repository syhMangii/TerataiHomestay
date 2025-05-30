<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'code', 'clinic_id'];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
