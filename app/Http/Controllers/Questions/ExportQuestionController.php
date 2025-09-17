<?php

namespace App\Http\Controllers\Questions;

use App\Exports\QuestionsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportQuestionController extends Controller
{
    public function __invoke()
    {
        return Excel::download(new QuestionsExport, 'preguntas.xlsx');
    }
}
