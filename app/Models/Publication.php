<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'publication'; // Define the table name if different from Laravel convention

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'thumbnail_image',
        'banner_image',
        'mb_banner_image',
        'vertical_image',
        'report_pdf',
        'report_cards',
        'key_highlights',
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

    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class, 'publication_tags')
    //                 ->withTimestamps(); // Establishes the many-to-many relationship
    // }


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'publication_tags', 'publication_id', 'tag_id');
    }



    public function publicationtags()
    {
        return $this->hasMany(PublicationTag::class);
    }
}
