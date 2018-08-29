<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idSeat
 * @property int $idMerchant
 * @property int $seatNumber
 * @property int $capacity
 * @property boolean $reserved
 * @property Merchant $merchant
 * @property Order[] $orders
 */
class Seat extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'seat';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idSeat';

    /**
     * @var array
     */
    protected $fillable = ['idMerchant', 'seatNumber', 'capacity', 'reserved'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchant()
    {
        return $this->belongsTo('App\Merchant', 'idMerchant', 'idMerchant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Order', 'idSeat', 'idSeat');
    }
}
