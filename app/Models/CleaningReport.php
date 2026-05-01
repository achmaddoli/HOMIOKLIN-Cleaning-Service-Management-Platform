<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CleaningReport extends Model
{
    use HasFactory;
    
    protected $table = 'cleaning_reports';

    protected $fillable = [
        'booking_id',
        'cleaner_id',          
        'initial_condition',   
        'cleaning_action',     
        'time_estimate',
        'process_date',
        'completion_date',
        'service_cost',
        'additional_cost',     
        'total_cost',
    ];

    protected $casts = [
        'process_date' => 'date',
        'completion_date' => 'date'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($report) {
            $report->total_cost = $report->service_cost + $report->additional_cost; // Ubah parts_cost
        });

        static::updating(function ($report) {
            $report->total_cost = $report->service_cost + $report->additional_cost; // Ubah parts_cost
        });
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // Mengubah relasi technician menjadi cleaner
    public function cleaner()
    {
        return $this->belongsTo(User::class, 'cleaner_id');
    }
}