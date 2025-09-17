<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'choice_id',
        'question_id',
        'evaluation_id',
        'description',
        'is_updateable',
    ];

    /**
     * ==========
     * RELATIONSHIPS
     * ==========
     */

    public function observation()
    {
        return $this->hasOne('App\Models\Observation');
    }

    public function choice()
    {
        return $this->belongsTo('App\Models\Choice');
    }

    public function evaluation()
    {
        return $this->belongsTo('App\Models\Evaluation');
    }

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
