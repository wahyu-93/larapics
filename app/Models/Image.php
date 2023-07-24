<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    public static function makeDirectory()
    {
        $subFolder = date('Y/m/d');
        Storage::makeDirectory("images/" . $subFolder);
        return $subFolder;
    }

    public static function getDimension($image)
    {
        [$width, $height] = getimagesize(Storage::path($image));
        return $width.'x'.$height;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    public function fileUrl()
    {
        return asset('storage/'.$this->file);
    }

    public function permalink()
    {
        return route('image.show', $this->slug);
    }
}
