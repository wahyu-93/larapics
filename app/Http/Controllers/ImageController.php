<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
       $images = Image::Published()->latest()->paginate(15);

       return view('image.index', compact('images'));
    }

    public function show(Image $image)
    {
        return view('image.show', compact('image'));
    }
}
