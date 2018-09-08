<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_branch
 * @property int $id_merchant
 * @property string $address
 * @property string $city
 * @property string $mobile
 * @property string $phone
 * @property Merchant $merchant
 * @property Day[] $days
 * @property Hour[] $hours
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
    protected $primaryKey = 'id_branch';

    /**
     * @var array
     */
    protected $fillable = ['id_merchant', 'address', 'city', 'mobile', 'phone'];

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
    public function days()
    {
        return $this->hasMany('App\Day', 'id_branch', 'id_branch');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hours()
    {
        return $this->hasMany('App\Hour', 'id_branch', 'id_branch');
    }
}
