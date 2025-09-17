<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Models\Choice;
use App\Models\Question;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateQuestionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Question $question)
    {
        $choicesToUpdate = collect($request->options)->where('id', '!=', null);

        foreach ($choicesToUpdate as $choiceToUpdate) {
            Choice::where('id', $choiceToUpdate['id'])->update([
                'punctuation' => $choiceToUpdate['punctuation'],
                'description' => $choiceToUpdate['description'],
            ]);
        }

        $question->choices()->whereNotIn('id', $choicesToUpdate->pluck('id')->flatten())->delete();

        $newChoices = collect($request->options)->where('id', '=', null);

        foreach ($newChoices as $newChoice) {
            Choice::create([
                'question_id' => $question->id,
                'punctuation' => $newChoice['punctuation'],
                'description' => $newChoice['description'],
            ]);
        }

        $question->description = $request->description;
        $question->help_text = $request->help_text;
        $question->is_optional = $request->is_optional ? 1 : 0;
        $question->has_description_field = $request->has_description_field ? 1 : 0;
        $question->description_label = $request->description_label;
        $question->category_id = $request->category_id;
        $question->subcategory_id = $request->subcategory_id;
        $question->save();

        Alert::success('¡Pregunta actualizada!');
        return redirect()->route('questions.index');
    }
}
