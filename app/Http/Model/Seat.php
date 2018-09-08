<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_seat
 * @property int $id_merchant
 * @property int $capacity
 * @property boolean $reserved
 * @property int $seat_number
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
    protected $primaryKey = 'id_seat';

    /**
     * @var array
     */
    protected $fillable = ['id_merchant', 'capacity', 'reserved', 'seat_number'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchant()
    {
        return $this->belongsTo('App\Merchant', 'id_merchant', 'id_merchant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Order', 'id_seat', 'id_seat');
    }
}
