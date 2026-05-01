<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'category_id');
    }

    public function listService()
    {
        return $this->hasMany(ListService::class, 'category_id');
    }
}
