<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'issuer',
        'description',
        'year',
        'verification_link',
        'order'
    ];
}
