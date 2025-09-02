<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventCity extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'events_cities'; 
    protected $fillable = ['event_id', 'city_id'];  // Removed created_by field

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function images()
    {
        return $this->hasMany(EventCityImage::class);
    }
}