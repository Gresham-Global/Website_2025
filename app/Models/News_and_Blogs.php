<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News_and_Blogs extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'news_and_blog'; // Define the table name if different from Laravel convention

    protected $fillable = [
        'title',
        'slug',
        'published_date',
        'type',
        'short_description',
        'gallery_images',
        'banner_image',
        'template',
        'description',
        'thumbnail_image',
        'share_link',
        'created_by',
        'updated_by',
        'deleted_by',
        'status'
    ];

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
