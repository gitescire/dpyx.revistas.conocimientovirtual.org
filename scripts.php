<?php

/**
 * --------------------------
 * Script to fill all answers
 * of an specific evaluation
 * --------------------------
 */

foreach (Evaluation::first()->answers as $answer) {
    $answer->update(['choice_id'=>$answer->question->choices()->get()->last()->id]);
}