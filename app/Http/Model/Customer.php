<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idCustomer
 * @property string $idUser
 * @property string $firstName
 * @property string $lastName
 * @property string $mobile
 * @property string $email
 * @property string $createDate
 * @property User $user
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
    protected $primaryKey = 'idCustomer';

    /**
     * @var array
     */
    protected $fillable = ['idUser', 'firstName', 'lastName', 'mobile', 'email', 'createDate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'idUser', 'idUser');
    }
}
