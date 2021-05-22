<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ImageUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ImagesController extends Controller
{
    public function create()
    {
        return Inertia::render('Admin/Images/create');
    }

    public function index()
    {
        $images = ImageUpload::all();

        return Inertia::render('Admin/Images/index', ['images' => $images]);
    }

    public function store(): RedirectResponse
    {
        $images = Collection::wrap(request()->file('file'));

        $images->each(function($image) {

            $baseName = Str::random(10);

            Admin::first()->createImage($image, $baseName);

        });

        return redirect()->route('admin.home');
    }
}
