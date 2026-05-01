<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'image',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
