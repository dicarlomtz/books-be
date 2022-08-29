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

    public static function saveCoverImage(Request $request)
    {
        $coverImage = $request->file('cover_image_file');

        $coverImageName = Str::uuid() . '.' . $coverImage->extension();

        $coverImageServicer = Image::make($coverImage);
        $coverImageServicer->fit(1000, 1000);

        $coverImagePath = public_path('cover-images') . '/' . $coverImageName;
        $coverImageServicer->save($coverImagePath);

        return $coverImageName;
    }

    public static function removeCoverImage(Book $book)
    {
        $coverImagePath = public_path('cover-images') . '/' . $book->cover_image;

        if(File::exists($coverImagePath))
        {
            unlink($coverImagePath);
        }
    }
}
