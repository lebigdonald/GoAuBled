<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Support\Collection;

class DestinationsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'city_from' => 'required',
            'image_from' => 'required',
            'text_from' => 'required',
            'city_to' => 'required',
            'image_to' => 'required',
            'text_to' => 'required',
        ]);

        $request = Collection::wrap(request()->all());

        Destination::create([
            'city_from' => $request['city_from'],
            'image_from' => $request['image_from'],
            'thumb_from' => $request['thumb_from'],
            'text_from' => $request['text_from'],

            'city_to' => $request['city_to'],
            'image_to' => $request['image_to'],
            'thumb_to' => $request['thumb_to'],
            'text_to' => $request['text_to'],
        ]);

        return redirect()->route('admin.home');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect()->route('admin.home');
    }
}
