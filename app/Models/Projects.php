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
        'tags',
        'link',
        'description',
        'image',
        'updated_at',
        'created_at',
    ];
}
