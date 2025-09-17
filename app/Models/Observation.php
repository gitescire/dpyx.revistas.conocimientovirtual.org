<?php

namespace App\Models;

use App\Casts\JsonCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer_id',
        'description',
        'files_paths',
    ];

    protected $casts = [
        'files_paths' => JsonCast::class,
    ];

    /**
     * ==========
     * RELATIONSHIPS
     * ==========
     */

    public function answer()
    {
        return $this->belongsTo('App\Models\Answer');
    }
}
