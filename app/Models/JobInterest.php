<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class JobInterest extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
        'phone_no',
        'interest_description',
        'role_description',
        'resume',
        'status',
        'career_id'
    ];
    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id');
    }
}
