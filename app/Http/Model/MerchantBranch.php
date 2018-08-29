<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idBranch
 * @property int $idMerchant
 * @property string $address
 * @property string $city
 * @property string $mobile
 * @property string $phone
 * @property Merchant $merchant
 */
class MerchantBranch extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'merchant_branch';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idBranch';

    /**
     * @var array
     */
    protected $fillable = ['idMerchant', 'address', 'city', 'mobile', 'phone'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchant()
    {
        return $this->belongsTo('App\Merchant', 'idMerchant', 'idMerchant');
    }
}
