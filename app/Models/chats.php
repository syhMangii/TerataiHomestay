<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chats extends Model
{
    protected $fillable = [
        'customer_id', 'admin_id', 'sent_by', 'message', 'created_at', 'updated_at'
     ];
 
     public function admin()
     {
         return $this->belongsTo('App\Models\User', 'admin_id');
     }
 
     public function customer()
     {
         return $this->belongsTo('App\Models\User', 'customer_id');
     }
}
