<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_user
 * @property string $created_at
 * @property string $email
 * @property string $last_login
 * @property string $password
 * @property string $prev_password
 * @property string $remember_token
 * @property string $updated_at
 * @property UserRole[] $userRoles
 * @property Customer[] $customers
 * @property Merchant[] $merchants
 */
class User extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = '_user';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_user';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'email', 'last_login', 'password', 'prev_password', 'remember_token', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRoles()
    {
        return $this->hasMany('App\UserRole', 'id_user', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers()
    {
        return $this->hasMany('App\Customer', 'id_user', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function merchants()
    {
        return $this->hasMany('App\Merchant', 'id_user', 'id_user');
    }
}
