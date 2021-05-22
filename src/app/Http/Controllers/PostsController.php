<?php

namespace App\Http\Controllers;

use App\Events\Post\PacketCreate;
use App\Events\Post\TravelCreate;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $key = !empty($request->get('key')) ? $request->get('key') : 'all';

        return view('posts.index', compact('key'));
    }

    public function travel()
    {
        return view('posts.travel.create');
    }

    public function packet()
    {
        return view('posts.packet.create');
    }

    public function posts(): JsonResponse
    {
        $posts = Post::where('publish',1)
            ->with('user')
            ->with('images')
            ->paginate(4);

        return response()->json($posts, 200);
    }

    public function travels(): JsonResponse
    {
        $travels = Post::where('publish',1)->where('categorie_id', 2)->with('user')->paginate(4);

        return response()->json($travels, 200);
    }

    public function packets()
    {
        $packets = Post::where('publish',1)->where('categorie_id', 1)->with('user')->paginate(4);

        return response()->json($packets, 200);
    }

    /**
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        $packets = Post::where('publish',1)->with('user')->get();

        return response()->json($packets, 200);
    }

    /**
     * @param Request $request
     */
    public function saveColiPost(Request $request)
    {
        Event::dispatch(new PacketCreate($request));
    }

    /**
     * @param Request $request
     */
    public function saveTravelPost(Request $request)
    {
        Event::dispatch(new TravelCreate($request));
    }
}
