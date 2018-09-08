<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_product
 * @property int $id_merchant
 * @property string $description
 * @property string $image
 * @property string $name
 * @property float $price
 * @property Merchant $merchant
 * @property OrderDetail[] $orderDetails
 * @property Review[] $reviews
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_product';

    /**
     * @var array
     */
    protected $fillable = ['id_merchant', 'description', 'image', 'name', 'price'];

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
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail', 'id_product', 'id_product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Review', 'id_product', 'id_product');
    }
}
