<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Khalyomede\EloquentUuidSlug\Sluggable;

class Job extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'total_attributes',
        'slug'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function education() {
        return $this->belongsTo(Education::class);
    }
}
