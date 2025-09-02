<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'event'; // Define the table name if different from Laravel convention

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'thumbnail_image',
        'description',
        'logo_image',
        'video_link',
        'share_link',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    protected $casts = [
        'gallery_images' => 'array',
    ];

    public function cities()
    {
        return $this->belongsToMany(City::class, 'events_cities')
                    ->withTimestamps();
    }

    public function eventCities()
    {
        return $this->hasMany(EventCity::class);
    }
    
    /**
     * Get the user who created the Event.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated the Event.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted the Event.
     */
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}