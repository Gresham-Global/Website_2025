<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublicationTag extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'publication_tags'; 
    protected $fillable = ['publication_id', 'tag_id'];  // Removed created_by field

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

}