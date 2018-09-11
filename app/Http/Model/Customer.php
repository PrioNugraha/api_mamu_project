<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_customer
 * @property int $id_user
 * @property string $create_date
 * @property string $first_name
 * @property string $last_name
 * @property string $mobile
 * @property User $user
 * @property Review[] $reviews
 */
class Customer extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customer';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_customer';

    /**
     * @var array
     */
    protected $fillable = ['id_user', 'create_date', 'first_name', 'last_name', 'mobile'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Http\Model\User', 'id_user', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Review', 'id_customer', 'id_customer');
    }
}
