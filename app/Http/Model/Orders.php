<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idOrder
 * @property string $billNumber
 * @property string $dateOrder
 * @property int $idSeat
 * @property int $totalSeat
 * @property string $serviceOrder
 * @property string $timeReserve
 * @property Seat $seat
 * @property OrderDetail[] $orderDetails
 */
class Orders extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idOrder';

    /**
     * @var array
     */
    protected $fillable = ['billNumber', 'dateOrder', 'idSeat', 'totalSeat', 'serviceOrder', 'timeReserve'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seat()
    {
        return $this->belongsTo('App\Seat', 'idSeat', 'idSeat');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail', 'idOrder', 'idOrder');
    }
}
