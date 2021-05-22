<?php


namespace App\Listeners\Post;


use App\Events\Post\PacketCreate;
use App\Models\Post;
use App\Models\Slug\MakeSlugProvider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SavePacketCreate
{
    public $makeSlugProvider;

    public function __construct(MakeSlugProvider $makeSlugProvider)
    {
        $this->makeSlugProvider = $makeSlugProvider;
    }

    public function handle(PacketCreate $event)
    {
        $request = $event->data;

        $this->validation($request);

        $title = "$request->from . '-' . $request->to .'-'. Carbon::parse($request->dateFrom)->format('y-m-d'). '-'. Carbon::parse($request->dateTo)->format('y-m-d')";

        $post =  Post::create([
            'user_id' => Auth::id(),
            'categorie_id' => 1, //coli
            'from' => $request->from,
            'to' => $request->to,
            'kilo' => 0,
            'prix' => 0,
            'slug' => $this->makeSlugProvider->createSlug($title),
            'dateFrom' => Carbon::parse($request->dateFrom)->format('Y-m-d H:i:s'),
            'dateTo' => Carbon::parse($request->dateFrom)->format('Y-m-d H:i:s'),
            'content' => $request->get('content'),
            'objects' => $request->get('objects'),
        ]);

        $images = $request->all()['images'];

        foreach ($images as $image) {

            $original = Str::random(10) . '.' . $image->getClientOriginalExtension();


            $img = Image::make($image)->fit(250, 250, function ($constraint) {

                $constraint->aspectRatio();

            });

            $img->stream();

            Storage::disk('uploads')->put('PacketsImages' . '/Post-'. $post->id .'/' . $original, $img);

            // store data into database
            $post->images()->create([
                'original' => '/uploads/PacketsImages/Post-'. $post->id .'/' . $original,
                'thumbail' => ''
            ]);
        }

        // redirect notify

        flash('Merci pour votre Post! Celui-ci sera publié apres verification :)')->success();

        return response(route('posts.index'), 200);
    }

    public function validation($request)
    {
        return $request->validate([
            'from' => 'required',
            'to' => 'required',
            'dateFrom' => 'required',
            'objects' => 'required'
        ]);
    }
}
