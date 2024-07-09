<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'finalAmount',
        'service_request_id',
        'user_id',
        'allowUpdate',
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function serviceRequest() : BelongsTo{
        return $this->belongsTo(ServiceRequest::class);
    }

    public function bookings(): HasMany {
        return $this->hasMany(Booking::class);
    }
}
