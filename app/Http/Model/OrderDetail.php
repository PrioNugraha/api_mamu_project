<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idOrder
 * @property int $idProduct
 * @property int $quantity
 * @property Order $order
 * @property Product $product
 */
class OrderDetail extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_detail';

    /**
     * @var array
     */
    protected $fillable = ['idOrder', 'idProduct', 'quantity'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'idOrder', 'idOrder');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'idProduct', 'idProduct');
    }
}
