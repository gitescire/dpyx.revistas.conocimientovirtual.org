<?php

namespace App\Http\Controllers\Subcategories;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StoreSubcategoryController extends Controller
{
    public function __invoke(StoreSubcategoryRequest $request)
    {
        $subcategory = new Subcategory;
        $subcategory->name = $request->name;
        $subcategory->save();

        Alert::success('¡Subcategoría creada!');
        return redirect()->route('subcategories.index');
    }
}
