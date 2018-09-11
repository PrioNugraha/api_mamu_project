<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

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
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

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
    protected $fillable = ['created_at', 'email', 'last_login', 'updated_at','password','prev_password'];

    protected $hidden = ['password', 'prev_password', 'remember_token'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRole()
    {
        return $this->hasOne('App\Http\Model\UserRole', 'id_user', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customer()
    {
        return $this->hasOne('App\Http\Model\Customer', 'id_user', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function merchants()
    {
        return $this->hasMany('App\Http\Model\Merchant', 'id_user', 'id_user');
    }
}
