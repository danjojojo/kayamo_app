<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'location',
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
    
    public function quotes() : HasMany{
        return $this->hasMany(Quote::class);
    }

    public function bookings(): HasMany {
        return $this->hasMany(Booking::class);
    }
}
