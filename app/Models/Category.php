<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name'];

    /**
     * ==========
     * RELATIONSHIPS
     * ==========
     */

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
