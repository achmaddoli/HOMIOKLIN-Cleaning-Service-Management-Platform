<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapCleaner extends Model
{
    use HasFactory;

    protected $table = 'rekap_cleaners';

    protected $fillable = [
        'cleaner_id', 
        'status',
    ];

    public function cleaner()
    {
        return $this->belongsTo(User::class, 'cleaner_id', 'id');
    }
}