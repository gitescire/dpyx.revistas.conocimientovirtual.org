<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'evaluator_id',
        'status',
    ];

    /**
     * ==============
     *  RELATIONSHIPS
     * ==============
     */

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function announcements(): BelongsToMany
    {
        return $this->belongsToMany(
            Announcement::class,
            'announcement__evaluation',
            'evaluation_id',
            'announcement_id'
        );
    }

    public function repositories(): BelongsToMany
    {
        return $this->belongsToMany(
            Repository::class,
            'evaluation__repository',
            'evaluation_id',
            'repository_id'
        );
    }

    public function evaluator()
    {
        return $this->belongsTo('App\Models\User', 'evaluator_id', 'id');
    }

    /**
     * =============
     * SCOPE METHODS
     * =============
     */

    public function scopeWhereAnnouncement(Builder $query, Announcement $announcement): Builder
    {
        return $query->whereHas('announcements', function (Builder $query) use ($announcement) {
            return $query->whereAnnouncement($announcement);
        });
    }

    public function scopeWhereEvaluator(Builder $query, int $userId): Builder
    {
        return $query->where('evaluations.evaluator_id', $userId);
    }

    public function scopeWhereEvaluation(Builder $query, Evaluation $evaluation): Builder
    {
        return $query->where('evaluations.id', $evaluation->id);
    }

    public function scopeWhereRepository(Builder $query, Repository $repository): Builder
    {
        return $query->whereHas('repositories', function (Builder $query) use ($repository) {
            return $query->whereRepository($repository);
        });
    }

    /**
     * ==============
     * CUSTOM METHODS
     * ==============
     */

    public function assignAnnouncement(Announcement $announcement)
    {
        $this->announcements()->syncWithoutDetaching([$announcement->id]);
    }

    public function assignEvaluator(int $userId)
    {
        $this->update([
            'evaluator_id' => $userId
        ]);
    }

    public function assignRepository(Repository $repository)
    {
        $this->repositories()->syncWithoutDetaching([$repository->id]);
    }

    /**
     * =====================
     * CALCULATED ATTRIBUTES
     * =====================
     */

    public function getStatusColorAttribute()
    {
        if ($this->is_in_progress) return 'info';
        if ($this->in_review) return 'warning';
        if ($this->is_reviewed) return 'success';
        if ($this->is_answered) return 'dark';
        return '';
    }

    /**
     * ========
     * BOOLEANS
     * ========
     */

    public function getIsInProgressAttribute()
    {
        return $this->status == 'en progreso';
    }

    public function getIsReviewedAttribute()
    {
        return $this->status == 'revisado';
    }

    public function getInReviewAttribute()
    {
        return $this->status == 'en revisión';
    }

    public function getIsAnsweredAttribute()
    {
        return $this->status == 'contestada';
    }

    public function getIsViewableAttribute()
    {
        if (Auth::user()->is_admin && $this->is_in_progress) {
            return false;
        }
        if (Auth::user()->is_evaluator && $this->is_in_progress) {
            return false;
        }
        if (Auth::user()->is_admin && $this->is_answered) {
            return false;
        }
        if (Auth::user()->is_evaluator && $this->is_answered) {
            return false;
        }
        return true;
    }

    public function getIsAnswerableAttribute()
    {
        $repository = $this->repositories()->first();

        if (Auth::user()->id != $repository->responsible->id) {
            return false;
        }

        if (!$announcement = Announcement::latest()->first()) {
            return false;
        }

        if (!$this->announcements()->whereAnnouncement($announcement)->exists()) {
            return false;
        }

        if (!$this->is_in_progress && !$this->is_answered) {
            return false;
        }
        if (!$repository->is_in_progress && !$repository->has_observations) {
            return false;
        }

        return true;
    }

    public function getIsReviewableAttribute()
    {
        if (!config('app.is_evaluable')) {
            return false;
        }

        if (Auth::user()->id != $this->evaluator->id) {
            return false;
        }
        if (!$this->in_review) {
            return false;
        }
        return true;
    }
}
