<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'media'; // Define the table name if different from Laravel convention

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'thumbnail_image',
        'logo_image',
        'media_link',
        'publish_date',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * Get the user who created the media.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated the media.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted the media.
     */
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
