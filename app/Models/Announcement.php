<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        "initial_date",
        "final_date",
    ];

    /**
     * ================
     * RELATION METHODS
     * ================
     */

    public function evaluations(): BelongsToMany
    {
        return $this->belongsToMany(
            Evaluation::class,
            'announcement__evaluation',
            'announcement_id',
            'evaluation_id'
        );
    }

    /**
     * ===========
     * SCOPE METHODS
     * ===========
     */

    public function scopeActive($query)
    {
        return $query->whereDate('initial_date', '<=', Carbon::now())
            ->whereDate('final_date', '>=', Carbon::now());
    }

    public function scopeWhereAnnouncement(Builder $query, Announcement $announcement): Builder
    {
        return $query->where('announcements.id', $announcement->id);
    }

    /**
     * =========
     * ATTTRIBUTES
     * =========
     */

    public function getStatusAttribute()
    {
        if ($this->initial_date > date('Y-m-d')) return 'pendiente';
        if ($this->final_date < date('Y-m-d')) return 'finalizado';
        return 'en progreso';
    }

    public function getStatusColorAttribute()
    {
        if ($this->is_pending) return 'warning';
        if ($this->is_finalized) return 'dark';
        if ($this->is_in_progress) return 'success';
    }

    /**
     * ========
     * BOOLEANS
     * ========
     */

    public function getIsPendingAttribute()
    {
        return $this->status == 'pendiente';
    }

    public function getIsFinalizedAttribute()
    {
        return $this->status == 'finalizado';
    }

    public function getIsInProgressAttribute()
    {
        return $this->status == 'en progreso';
    }
}
