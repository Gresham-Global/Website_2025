<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublicationsReport extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'publications_report'; // Define the table name if different from Laravel convention

    protected $fillable = [
        'full_name',
        'publication_title',
        'publication_id',
        'email_id',
        'report_url',
        'count',
        'created_by',
        'updated_by',
        'deleted_by',
        'status'
    ];
 
}
