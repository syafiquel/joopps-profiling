<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Khalyomede\EloquentUuidSlug\Sluggable;

class UserSession extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'user_id',
        'slug',
        'job_id',
        'attribute_score',
        'final_attribute_score',
        'attribute_score_details',
        'education_score',
        'affiliation_score',
        'experience_score',
        'current_question',
        'details',
        'is_tnc_checked'
    ];

    public function job() {
        return $this->belongsTo(Job::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

   
}
