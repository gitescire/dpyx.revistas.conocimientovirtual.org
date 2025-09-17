<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Repository extends Model
{
    use HasFactory;

    const IN_PROGRESS_STATUS = 'en progreso';

    protected $table = "repositories";
    protected $fillable = [
        "responsible_id",
        "name",
        "status",
    ];

    /**
     * ==========
     * RELATIONSHIPS
     * ==========
     */

    public function responsible()
    {
        return $this->belongsTo('App\Models\User', 'responsible_id');
    }

    public function evaluations(): BelongsToMany
    {
        return $this->belongsToMany(
            Evaluation::class,
            'evaluation__repository',
            'repository_id',
            'evaluation_id'
        );
    }

    public function evaluationsHistory()
    {
        return $this->hasMany('App\Models\EvaluationHistory');
    }

    /**
     * =============
     * SCOPE METHODS
     * =============
     */
    public function scopeWhereRepository(Builder $query, Repository $repository): Builder
    {
        return $query->where('repositories.id', $repository->id);
    }

    /**
     * ==============
     * CUSTOM METHODS
     * ==============
     */

    public function toInProgress()
    {
        $this->update([
            'status' => Repository::IN_PROGRESS_STATUS
        ]);
    }

    /**
     * ========
     * ATTRIBUTES
     * ========
     */

    public function getStatusColorAttribute()
    {
        if ($this->is_in_progress) return 'info';
        if ($this->is_aproved) return 'success';
        if ($this->is_rejected) return 'danger';
        if ($this->has_observations) return 'warning';
    }

    public function getQualificationAttribute()
    {
        $evaluation = $this->evaluations()->latest()->first();

        if ($evaluation->answers->pluck('choice.question.max_punctuation')->flatten()->sum() == 0) return 0;

        return round($evaluation->answers->pluck('choice.punctuation')->flatten()->sum() / $evaluation->answers->pluck('question.max_punctuation')->flatten()->sum() * 100, 2);
    }

    /**
     * =======
     * BOOLEANS
     * =======
     */

    public function getIsInProgressAttribute()
    {
        return $this->status == 'en progreso';
    }

    public function getHasObservationsAttribute()
    {
        return $this->status == 'observaciones';
    }

    public function getIsAprovedAttribute()
    {
        return $this->status == 'aprobado';
    }

    public function getIsRejectedAttribute()
    {
        return $this->status == 'rechazado';
    }
}
