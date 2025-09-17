<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DestroyCategoryController extends Controller
{
    public function __invoke(Request $request, Category $category)
    {

        $category->questions()->update([
            'category_id' => $request->newCategory
        ]);

        $category->delete();
        
        Alert::success('¡Categoría eliminada!');
        return redirect()->back();
    }
}
