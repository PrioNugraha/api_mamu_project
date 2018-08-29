<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idReview
 * @property int $idProduct
 * @property int $idCustomer
 * @property float $rate
 * @property string $description
 * @property string $dateReview
 * @property Customer $customer
 * @property Product $product
 */
class Review extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'review';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idReview';

    /**
     * @var array
     */
    protected $fillable = ['idProduct', 'idCustomer', 'rate', 'description', 'dateReview'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'idCustomer', 'idCustomer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'idProduct', 'idProduct');
    }
}
