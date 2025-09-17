<?php

namespace App\Http\Controllers\Evaluations;

use App\Events\EvaluationFinishedEvent;
use App\Http\Controllers\Controller;
use App\Models\AnswerHistory;
use App\Models\Evaluation;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use PDF;

class ExportEvaluationController extends Controller
{
    public function __invoke(Request $request, Evaluation $evaluation)
    {
        $repository = $evaluation->repositories()->first();
        $categories = Category::has('questions')->get();
        $subcategories = Subcategory::has('questions')->with(['questions.answers' => function ($query) use ($evaluation) {
            $query->where('evaluation_id', $evaluation->id);
        }])->get();

        return PDF::loadView('pdfs.evaluation', compact('repository', 'categories', 'subcategories'))->download('Evaluacion-' . $repository->name . '-' . date('Y') . '.pdf');
    }
}
