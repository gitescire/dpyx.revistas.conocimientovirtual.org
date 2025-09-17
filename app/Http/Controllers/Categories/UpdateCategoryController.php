<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->short_name = $request->short_name;
        $category->save();

        Alert::success('¡Categoría editada!');
        return redirect()->route('categories.index');
    }
}
