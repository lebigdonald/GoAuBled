<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserNotifyPostValidate;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Tables/Posts');
    }

    /**
     * @return JsonResponse
     */
    public function posts(): JsonResponse
    {
        $data = Post::with('images')->paginate(5);
        return response()->json($data);
    }

    /**
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function validatePost(Post $post): RedirectResponse
    {
        $post->update(['publish' => true]);
        //notify user
        event(new UserNotifyPostValidate($post->user, $post));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->back();
    }

    public function deleteAll(): Response
    {
        Post::all()->each(function ($post) {
           $post->delete();
        });

        return Inertia::render('Admin/Tables/Posts');
    }
}
