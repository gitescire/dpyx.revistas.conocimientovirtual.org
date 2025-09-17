<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationHistory extends Model
{
    use HasFactory;

    protected $table = "evaluations_history";

    protected $fillable = [
        'repository_id',
        'evaluator_id',
        'status',
    ];

    public function answersHistory()
    {
        return $this->hasMany('App\Models\AnswerHistory');
    }

    public function evaluator()
    {
        return $this->belongsTo('App\Models\User');
    }
}
