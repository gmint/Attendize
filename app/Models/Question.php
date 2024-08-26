<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Description of Questions.
 *
 * @author Dave
 */
class Question extends MyBaseModel
{
    use SoftDeletes;

    /**
     * The events associated with the question.
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Event::class);
    }

    /**
     * The type associated with the question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function question_type(): BelongsTo
    {
        return $this->belongsTo(\App\Models\QuestionType::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(\App\Models\QuestionAnswer::class);
    }

    /**
     * The options associated with the question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function options(): HasMany
    {
        return $this->hasMany(\App\Models\QuestionOption::class);
    }

    public function tickets(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Ticket::class);
    }

    /**
     * Scope a query to only include active questions.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsEnabled($query)
    {
        return $query->where('is_enabled', 1);
    }
}
