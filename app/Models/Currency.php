<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/*
  Attendize.com   - Event Management & Ticketing
 */

/**
 * Description of Currency.
 *
 * @author Dave
 */
class Currency extends \Illuminate\Database\Eloquent\Model
{
    /**
     * Indicates whether the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
     * Indicates whether the model should use soft deletes.
     *
     * @var bool
     */
    protected $softDelete = false;

    /**
     * The event associated with the currency.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Event::class);
    }
}
