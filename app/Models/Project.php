<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'main_image',
        'images',
        'description',
        'demo_link',
        'github_link',
        'technologies',
        'is_featured',
        'order'
    ];

    protected $casts = [
        'images' => 'array',
        'technologies' => 'array',
        'is_featured' => 'boolean',
    ];
}
