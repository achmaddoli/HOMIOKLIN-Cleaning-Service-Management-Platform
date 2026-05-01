<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'hp',
        'alamat',
        'role_id',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'customer_id');
    }

    public function cleaningReports()
    {
        return $this->hasMany(CleaningReport::class, 'cleaner_id');
    }


    public function rekapCleaner()
    {
        return $this->hasOne(RekapCleaner::class, 'cleaner_id', 'id');
    }

    public function isAdmin(): bool
    {
        return $this->role->name === 'admin';
    }

    public function isCleaner(): bool
    {
        return $this->role->name === 'cleaner';
    }

    public function isCustomer(): bool
    {
        return $this->role->name === 'user';
    }
}