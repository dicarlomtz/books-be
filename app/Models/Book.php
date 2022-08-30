<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'published_year',
        'available',
        'authors',
        'co_authors',
        'cover_image'
    ];

    protected $casts = [
        'authors' => 'array',
        'co_authors' => 'array'
    ];
}
