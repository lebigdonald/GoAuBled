<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Inertia\Inertia;
use App\Models\Category;
use Inertia\Response;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $categories = Category::all();

       return Inertia::render('Admin/Faq/Category/Index', [
           'categories' => $categories
       ]);
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Category|Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
       $request->validate([
          'name' => 'required'
       ]);


       if (!is_null($request->get('id'))) {

        Category::find($request->get('id'))->update(['name' => $request->get('name')]);

        return redirect(route('category.index'));

       }

        Category::create(['name' => $request->get('name')]);

       return redirect(route('category.index'));

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Application|RedirectResponse|Redirector
     * @throws \Exception
     */
    public function destroy(Category $category)
    {

        $category->delete();

        return redirect(route('category.index'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex(): Response
    {
        $categories = Category::all();

       return Inertia::render('Admin/Faq/Questions/Index', [
           'categories' => $categories
       ]);
    }
}
