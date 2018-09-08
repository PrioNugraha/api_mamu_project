<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_review
 * @property int $id_customer
 * @property int $id_product
 * @property string $dateReview
 * @property string $description
 * @property float $rate
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
    protected $primaryKey = 'id_review';

    /**
     * @var array
     */
    protected $fillable = ['id_customer', 'id_product', 'dateReview', 'description', 'rate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'id_customer', 'id_customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'id_product', 'id_product');
    }
}
