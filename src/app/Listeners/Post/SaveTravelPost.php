<?php


namespace App\Listeners\Post;


use App\Events\Post\TravelCreate;
use App\Models\Post;
use App\Models\Slug\MakeSlugProvider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SaveTravelPost
{

    public $makeSlugProvider;

    public function __construct(MakeSlugProvider $makeSlugProvider)
    {
        $this->makeSlugProvider = $makeSlugProvider;
    }

    public function handle(TravelCreate $event)
    {
        $request = $event->data;

        $title = "$request->from . '-' . $request->to .'-'. Carbon::parse($request->dateFrom)->format('y-m-d'). '-'. Carbon::parse($request->dateTo)->format('y-m-d')";

        $this->validate($request);

        $post = Post::create([
            'user_id' => Auth::id(),
            'categorie_id' => 2, //travel
            'from' => $request->from,
            'to' => $request->to,
            'dateFrom' => Carbon::parse($request->dateFrom)->format('Y-m-d H:i:s'),
            'dateTo' => Carbon::parse($request->dateTo)->format('Y-m-d H:i:s'),
            'content' => $request->get('content'),
            'kilo' => $request->get('kilo'),
            'prix' => $request->get('prix'),
            'slug' => $this->makeSlugProvider->createSlug($title),
            'compagnie' => $request->get('compagnie'),
            'photoBielletAvion' => '',
            'objects' => $request->get('objects'),
        ]);

        $images = $request->all()['images'];

        foreach ($images as $image) {

            $original = Str::random(10) . '.' . $image->getClientOriginalExtension();


            $img = Image::make($image)->fit(250, 250, function ($constraint) {

                $constraint->aspectRatio();

            });

            $img->stream();

            Storage::disk('uploads')->put('PostImages' . '/Post-'. $post->id .'/' . $original, $img);

            // store data into database
            $post->images()->create([
                'original' => '/uploads/PostImages/Post-'. $post->id .'/' . $original,
                'thumbail' => ''
            ]);
        }

        // redirect notify

        flash('Merci pour votre Post! Celui-ci sera publié apres verification :)')->success();

        return response(route('posts.index'), 200);
    }


    public function validate($request)
    {
        return $request->validate([
            'from' => 'required',
            'to' => 'required',
            'dateFrom' => 'required',
            'dateTo' => 'required',
            'kilo' => 'required',
            'prix' => 'required',
            'compagnie' => 'required'
        ]);
    }
}
