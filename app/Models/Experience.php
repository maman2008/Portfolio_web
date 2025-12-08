<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'image',
        'title',
        'position',
        'description',
        'start_year',
        'end_year',
        'is_current',
        'order'
    ];

    protected $casts = [
        'is_current' => 'boolean',
    ];
}
