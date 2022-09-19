<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'id_bike', 
        'start_date', 
        'bike_brand', 
        'bike_price', 
        'duration',
        'key'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
