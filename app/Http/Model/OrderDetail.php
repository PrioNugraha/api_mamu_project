<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_order
 * @property int $id_product
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
    protected $fillable = ['id_order', 'id_product', 'quantity'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'id_order', 'id_order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'id_product', 'id_product');
    }
}
