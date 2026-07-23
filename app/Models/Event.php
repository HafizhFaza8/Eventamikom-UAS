<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    protected $fillable = [
        'category_id', 'organizer_id', 'title', 'description', 'date',
        'location', 'price', 'stock', 'poster_path'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating()
    {
        $avg = $this->reviews()->avg('rating');
        return $avg ? round($avg, 1) : 5.0;
    }

    public function reviewsCount()
    {
        return $this->reviews()->count();
    }
}
