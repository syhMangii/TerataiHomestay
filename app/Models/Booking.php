<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'homestay_id',
        'booking_date',
        'booking_description',
        'booking_total_price',
        'booking_status',
        'created_by',
        'updated_by',
    ];

    public function Homestay()
    {
        return $this->belongsTo(homestays::class, 'homestay_id');
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

