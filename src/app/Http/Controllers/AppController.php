<?php

namespace App\Http\Controllers;

use App\Events\userMessage;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Pages\ImageText;
use App\Models\Pages\Page;
use App\Models\Pages\Step;
use App\Models\Pages\StepCategorie;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home()
    {
        $header = ImageText::where('section', 'header')->latest()->first();
        $about = ImageText::where('section', 'about')->latest()->first();

        $posts = Post::with('user')
            ->latest()->limit(3)
            ->where('publish', true)
            ->get();

        $steps = Step::limit(3)->get();
        $destinations = Destination::all();
        $testimonials = Testimonial::with('user')->limit(3)->get();

        return view('App.welcome', [
            'header' => $header,
            'about' => $about,
            'posts' => $posts,
            'steps' => $steps,
            'destinations' => $destinations,
            'testimonials' => $testimonials
        ]);
    }

    public function about(){

        $page = Page::where('page', 'about')->latest()->first();

        return view('pages.about',compact('page'));
    }

    public function agb(){

        $page = Page::where('page', 'agb')->latest()->first();

        return view('pages.agb',compact('page'));
    }

    /**
     * @return Application|Factory|View
     */
    public function impressum(){

        $page = Page::where('page', 'impressum')->latest()->first();

        return view('pages.impressum',compact('page'));
    }

    public function termsOfservice(){

        $page = Page::where('page', 'termsOfservice')->latest()->first();

        return view('pages.termsOfservice',compact('page'));
    }

    /**
     * @return Application|Factory|View
     */
    public function principes(){

        $page = Page::where('page', 'principes')->latest()->first();

        return view('pages.principes',compact('page'));
    }

    /**
     * cette page est une page particuliere
     * car elle est generer directement par l utilisateur(Admin)
     * @return Application|Factory|View
     */
    public function howItWork(){

        $categories = StepCategorie::all()->load('steps');

        return view('pages.howItWork', compact('categories'));
    }

    public function contactUs()
    {
        return view('pages.contactUs');

    }

    /**
     * cette page est une page particuliere
     * car elle est generer directement par l utilisateur(Admin)
     * @return Application|Factory|View
     */
    public function faq()
    {
        $faqs = Category::all()->load('questions');

        return view('pages.faq', compact('faqs'));
    }

    public function senMessage(Request $request)
    {
        event(new userMessage($request->all()));

    }
}
