<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_merchant
 * @property int $id_user
 * @property string $create_date
 * @property string $description
 * @property string $name
 * @property User $user
 * @property MerchantBranch[] $merchantBranches
 * @property Product[] $products
 * @property Seat[] $seats
 */
class Merchant extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'merchant';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_merchant';

    /**
     * @var array
     */
    protected $fillable = ['id_user', 'create_date', 'description', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function merchantBranches()
    {
        return $this->hasMany('App\MerchantBranch', 'id_merchant', 'id_merchant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'id_merchant', 'id_merchant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seats()
    {
        return $this->hasMany('App\Seat', 'id_merchant', 'id_merchant');
    }
}
