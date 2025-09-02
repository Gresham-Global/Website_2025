<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'slug'
    ];

    // public function publications()
    // {
    //     return $this->belongsToMany(PublicationTag::class, 'publication_tags')->withTimestamps();
    // }

    public function publications()
    {
        return $this->belongsToMany(Publication::class, 'publication_tags', 'tag_id', 'publication_id')->withTimestamps();
    }
}
