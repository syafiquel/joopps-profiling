<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Khalyomede\EloquentUuidSlug\Sluggable;

class Answer extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'expected_answer',
        'job_id',
        'attribute_id',
        'slug'
    ];

    public function job() {
        return $this->belongsTo(Job::class);
    }

    public function attribute() {
        return $this->belongsTo(Attribute::class);
    }
    
}
