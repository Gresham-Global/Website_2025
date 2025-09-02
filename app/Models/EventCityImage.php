<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventCityImage extends Model
{
    use HasFactory;
    
    protected $table = 'event_city_images';
    protected $fillable = ['event_id','city_id', 'image_path', 'caption','created_by','updated_by'];
    
    public function eventCity()
    {
        return $this->belongsTo(EventCity::class);
    }
}
