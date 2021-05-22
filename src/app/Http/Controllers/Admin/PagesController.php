<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Pages\Page;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PagesController extends Controller
{
    public function about(): Response
    {
        $page = Page::where('page', 'about')->latest()->first();

        return Inertia::render('Admin/About', [
            'page' => $page
        ]);
    }

    public function principes(): Response
    {
        $page = Page::where('page', 'principes')->latest()->first();

        return Inertia::render('Admin/principes', [
            'page' => $page
        ]);
    }

    public function privacy(): Response
    {
        $page = Page::where('page', 'privacy')->latest()->first();

        return Inertia::render('Admin/privacy', [
            'page' => $page
        ]);
    }

    public function termsOfservice(): Response
    {
        $page = Page::where('page', 'termsOfservice')->latest()->first();

        return Inertia::render('Admin/termsOfservice', [
            'page' => $page
        ]);
    }

    public function impressum(): Response
    {
        $page = Page::where('page', 'impressum')->latest()->first();

        return Inertia::render('Admin/impressum', [
            'page' => $page
        ]);
    }

    public function agb(): Response
    {
        $page = Page::where('page', 'agb')->latest()->first();

        return Inertia::render('Admin/agb', [
            'page' => $page
        ]);
    }

    public function store(Request $request)
    {
        $page = Page::create([
            'json' => $request->get('jsonData'),
            'html' => $request->get('pageHtml'),
            'page' => $request->get('name'),
            'title' => $request->get('title'),
            'metaDescription' => $request->get('metaDescription')
        ]);

        return redirect()->route('admin.home');
    }
}
