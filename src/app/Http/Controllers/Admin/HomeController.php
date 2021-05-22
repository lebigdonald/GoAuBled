<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Pages\Home;
use App\Models\Pages\ImageText;
use App\Models\Pages\Step;
use App\Models\Pages\StepCategorie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public $home;

    public function __construct()
    {
        $home = new Home();
        $home->id = 1;
        $this->home = $home;
    }

    public function create(): Response
    {
        $images = Admin::first()->images;
        $header = ImageText::where('section', 'header')->latest()->first();
        $about = ImageText::where('section', 'about')->latest()->first();

        $steps = Step::with('category');

        $categories = StepCategorie::all()->load('steps');

        return Inertia::render('Admin/Edit/Home',[
            'images' => $images,
            'editheader' => $header,
            'about' => $about,
            'steps' => $steps,
            'categories' => $categories
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        if($request->get('id') == null) {
            //store
            $this->home->header()->create([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'image' => $request->get('image'),
                'thumb' => $request->get('thumb'),
                'section' => $request->get('section')
            ]);
        }

        if($request->get('id') !== null) {
            //update
            ImageText::find($request->get('id'))->update([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'image' => $request->get('image'),
                'thumb' => $request->get('thumb'),
                'section' => $request->get('section')
            ]);
        }
        return redirect()->route('admin.home');
    }

    public function home(): Response
    {
        $header = ImageText::where('section', 'header')->latest()->first();
        $about = ImageText::where('section', 'about')->latest()->first();

        return Inertia::render('User/Home/Home', [
            'header' => ImageText::where('section', 'header')->latest()->first(),
            'about' => ImageText::where('section', 'about')->latest()->first()
        ]);
    }
}
