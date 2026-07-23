<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\User;

class Review extends Model
{
    protected $fillable = [
        'event_id',
        'user_id',
        'customer_name',
        'customer_email',
        'rating',
        'comment',
        'organizer_name',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
