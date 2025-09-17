<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';
    protected $fillable = ['name'];

    /**
     * ==========
     * RELATIONSHIPS
     * ==========
     */

    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'subcategory_id');
    }

    /**
     * =======
     * BOOLEANS
     * =======
     */

    public function getHasQuestionsAttribute()
    {
        return $this->questions->count() ? true : false;
    }
}
