<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id',
        'service_request_id',
        'user_id',
        'confirmCustomer',
        'confirmHandyman',
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function serviceRequest() : BelongsTo{
        return $this->belongsTo(ServiceRequest::class);
    }

    public function quote() : BelongsTo{
        return $this->belongsTo(Quote::class);
    }

    public function reviews() : HasMany{
        return $this->hasMany(Review::class);
    }
}