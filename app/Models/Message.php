<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/*
  Attendize.com   - Event Management & Ticketing
 */

/**
 * Description of Message.
 *
 * @author Dave
 */
class Message extends MyBaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message',
        'subject',
        'recipients',
    ];

    /**
     * The event associated with the message.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Event::class);
    }

    /**
     * Get the recipient label of the model.
     *
     * @return string
     */
    public function getRecipientsLabelAttribute()
    {
        if ($this->recipients == 0) {
            return 'All Attendees';
        }

        $ticket = Ticket::scope()->find($this->recipients);

        return 'Ticket: '.$ticket->title;
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @return array $dates
     */
    public function getDates()
    {
        return ['created_at', 'updated_at', 'sent_at'];
    }
}
