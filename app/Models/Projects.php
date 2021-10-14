<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillables = [
        'title',
        'slug',
        'link',
        'image',
        'description',
        'updated_at',
    ];

    protected $casts = [
        'tags' => 'array'
    ];
}
