<?php

namespace App\Http\Controllers\Subcategories;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DestroySubcategoryController extends Controller
{
    public function __invoke(Request $request, Subcategory $subcategory)
    {
        $subcategory->questions()->update([
            'subcategory_id' => $request->newSubcategory
        ]);

        $subcategory->delete();

        Alert::success('¡Subcategoría eliminada!');
        return redirect()->back();
    }
}
