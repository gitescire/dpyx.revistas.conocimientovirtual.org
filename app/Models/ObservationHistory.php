<?php

namespace App\Models;

use App\Casts\JsonCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObservationHistory extends Model
{
    use HasFactory;

    protected $table = "observations_history";

    protected $fillable = [
        'answer_history_id',
        'description',
        'files_paths',
    ];

    protected $casts = [
        'files_paths' => JsonCast::class,
    ];
}
