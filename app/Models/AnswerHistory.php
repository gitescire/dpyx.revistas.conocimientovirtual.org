<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerHistory extends Model
{
    use HasFactory;

    protected $table = "answers_history";

    protected $fillable = [
        'choice_id',
        'question_id',
        'evaluation_history_id',
        'description',
    ];

    public function observationHistory()
    {
        return $this->hasOne('App\Models\ObservationHistory');
    }

    public function choice(){
        return $this->belongsTo('App\Models\Choice');
    }

    public function observation(){
        return $this->hasOne('App\Models\ObservationHistory');
    }
}
