<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Evaluation;
use App\Models\Question;
use App\Synchronizers\AnswerSynchronizer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StoreQuestionController extends Controller
{
    public function __invoke(Request $request)
    {
        $question = new Question;
        $question->description = $request->description;
        $question->order = $request->order;
        $question->help_text = $request->help_text;
        $question->is_optional = $request->is_optional ? 1 : 0;
        $question->has_description_field = $request->has_description_field ? 1 : 0;
        $question->description_label = $request->description_label;
        $question->category_id = $request->category_id;
        $question->subcategory_id = $request->subcategory_id;
        $question->save();



        if ($request->options) {
            foreach ($request->options as $option) {
                $question->choices()->create([
                    'description' => $option['description'],
                    'punctuation' => $option['punctuation']
                ]);
            }
        }

        $this->appendQuestionToAllEvaluations($question);

        Alert::success('¡Pregunta creada!');
        return redirect()->route('questions.index');
    }

    protected function appendQuestionToAllEvaluations(Question $question)
    {
        foreach (Evaluation::get() as $evalution) {
            $answer = Answer::create([
                'evaluation_id' => $evalution->id,
                'question_id' => $question->id,
            ]);
            (new AnswerSynchronizer($answer))->execute();
        }

    }
}
