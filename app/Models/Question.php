<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $appends = ['max_punctuation'];

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'help_text',
        'order',
        'is_optional',
        'has_description_field',
        'description_label',
    ];

    /**
     * ==========
     * RELATIONSHIPS
     * ==========
     */

    /**
     * 
     *
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function Subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function choices()
    {
        return $this->hasMany('App\Models\Choice');
    }

    /**
     * ===========
     * SCOPE METHODS
     * ===========
     */

    public function scopeRequired($query)
    {
        return $query->where('is_optional', 0);
    }

    public function scopeSupplementaries($query)
    {
        return $query->where('is_optional', 1);
    }

    /**
     * ========
     * ATTRIBUTES
     * ========
     */

    public function getMaxPunctuationAttribute()
    {
        $choice = $this->choices()->orderBy('punctuation', 'desc')->first();
        return $choice ? $choice->punctuation : 0;
    }
}
