<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Khalyomede\EloquentUuidSlug\Sluggable;

class Question extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'content',
        'slug',
        'dimension_id',
        'attribute_id',
        'answer_id',
        'is_positive',
        'is_displayed'
    ];
}
