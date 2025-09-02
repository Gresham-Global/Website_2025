<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cities'; // Define the table name if different from Laravel convention
    protected $fillable = ['city_name', 'state', 'country', 'type'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'events_cities')
                    ->withTimestamps();
    }
}