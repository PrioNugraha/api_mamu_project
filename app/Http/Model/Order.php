<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_order
 * @property int $id_seat
 * @property string $bill_number
 * @property string $date_order
 * @property string $service_order
 * @property string $time_reserve
 * @property int $total_seat
 * @property Seat $seat
 * @property OrderDetail[] $orderDetails
 */
class Order extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_order';

    /**
     * @var array
     */
    protected $fillable = ['id_seat', 'bill_number', 'date_order', 'service_order', 'time_reserve', 'total_seat'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seat()
    {
        return $this->belongsTo('App\Seat', 'id_seat', 'id_seat');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail', 'id_order', 'id_order');
    }
}
