<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'name',
        'image',
        'issuer',
        'year',
        'verification_link',
        'order'
    ];
}
