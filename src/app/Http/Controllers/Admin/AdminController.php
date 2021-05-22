<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Destination;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{

    public function home(): Response
    {
        $travels = Post::where('categorie_id',2)->count();

        $packs = Post::where('categorie_id',1)->count();

        $users = User::all()->count();

        $destinations = Destination::latest()->get();

        return Inertia::render('Admin/Home', [
            'travels' => $travels,
            'packs' => $packs,
            'users' => $users,
            'destinations' => $destinations
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Users/create');
    }

    public function store(): RedirectResponse
    {
        Request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        Admin::create([
            'name' => request()->get('name'),
            'email' => request()->get('email'),
            'password' => Hash::make(request()->get('password'))
        ]);

        return redirect()->route('admin.home');
    }
}
