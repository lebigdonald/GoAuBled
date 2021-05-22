<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Inertia\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $categories = Category::latest()->get();


        return Inertia::render('Admin/Faq/Questions/Index', [
            'categories' => $categories
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'answer' => 'required',
            'category_id' => 'required',
        ]);

        if (!is_null($request->get('id'))) {

            Question::find($request->get('id'))->update(['name' => $request->get('name'),
                'answer' => $request->get('answer'),
                'category_id' => $request->get('category_id')
            ]);

            return redirect(route('question.index'));

        }

        Question::create($request->all());
        return redirect(route('question.index'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Question  $question
     * @return \Illuminate\Http\Response
     */
    public function  destroy(Question $question)
    {

        $question->delete();

        return redirect(route('question.index'));
    }


      /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
       */
    public function getAll()
    {
        $data = Question::all()->load('category');

        return response()->json($data, 200);
    }

}
