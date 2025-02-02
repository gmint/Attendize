<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountPaymentGateway extends MyBaseModel
{
    use softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_gateway_id',
        'account_id',
        'config',
    ];

    /**
     * Account associated with gateway
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Account::class);
    }

    /**
     * Parent payment gateway
     */
    public function payment_gateway(): BelongsTo
    {
        return $this->belongsTo(\App\Models\PaymentGateway::class, 'payment_gateway_id', 'id');
    }

    /**
     * @return mixed
     */
    public function getConfigAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setConfigAttribute($value)
    {
        $this->attributes['config'] = json_encode($value);
    }
}
