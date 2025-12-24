<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Life extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'life'; // Define the table name if different from Laravel convention

    protected $fillable = [
        'title',
        'slug',
        'thumbnail_image',
        'status',
        'order',
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
