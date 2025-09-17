<?php

namespace App\Observers;

use App\Models\Answer;
use App\Models\Evaluation;
use App\Models\Question;

class EvaluationObserver
{
    /**
     * Handle the Evaluation "created" event.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return void
     */
    public function created(Evaluation $evaluation)
    {
        // Create empty answers for each question
        Question::get()->each(function ($question) use ($evaluation) {
            Answer::create([
                'evaluation_id' => $evaluation->id,
                'question_id' => $question->id,
                'is_updateable' => 1,
            ]);
        });
    }

    /**
     * Handle the Evaluation "updated" event.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return void
     */
    public function updated(Evaluation $evaluation)
    {
        //
    }

    /**
     * Handle the Evaluation "deleted" event.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return void
     */
    public function deleted(Evaluation $evaluation)
    {
        //
    }

    /**
     * Handle the Evaluation "restored" event.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return void
     */
    public function restored(Evaluation $evaluation)
    {
        //
    }

    /**
     * Handle the Evaluation "force deleted" event.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return void
     */
    public function forceDeleted(Evaluation $evaluation)
    {
        //
    }
}
