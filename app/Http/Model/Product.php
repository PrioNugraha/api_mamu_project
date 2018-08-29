<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idProduct
 * @property int $idMerchant
 * @property string $name
 * @property string $description
 * @property string $image
 * @property float $price
 * @property Merchant $merchant
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
    protected $primaryKey = 'idProduct';

    /**
     * @var array
     */
    protected $fillable = ['idMerchant', 'name', 'description', 'image', 'price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchant()
    {
        return $this->belongsTo('App\Merchant', 'idMerchant', 'idMerchant');
    }
}
