<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages\Step;
use App\Models\Pages\StepCategorie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class StepController extends Controller
{
    public function store(): RedirectResponse
    {
       //store
       $steps = Collection::wrap(request()->all());

       $steps->each(function($step) {

        if ($step['id'] == null) {

            Step::create([
                'title' => $step['title'],
                'text' => $step['text'],
                'step_categories_id' => $step['category']
            ]);
        }

        if ($step['id'] !== null) {

            Step::find($step['id'])->update([
                'title' => $step['title'],
                'text' => $step['text'],
                'step_categories_id' => $step['category']
            ]);
        }

       });

       return redirect()->route('admin.home');
   }

    public function StepCatStore(Request $request): RedirectResponse
    {
        StepCategorie::create($request->all());

        return redirect()->route('home.edit');
   }

    public function StepCatDelete(Request $request): RedirectResponse
    {
        StepCategorie::find($request->get('id'))->delete();

        return redirect()->route('home.edit');
   }
}
