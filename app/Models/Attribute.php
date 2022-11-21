<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Khalyomede\EloquentUuidSlug\Sluggable;

class Attribute extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'id',
        'name'
    ];
}
