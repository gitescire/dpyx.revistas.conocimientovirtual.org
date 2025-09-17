<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DestroyQuestionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Question $question)
    {
        $question->answers()->delete();
        $question->choices()->delete();

        $question->delete();
        Alert::success('¡Pregunta eliminada!');
        return redirect()->back();
    }
}
