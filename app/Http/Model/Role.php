<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_role
 * @property string $create_date
 * @property string $role_name
 * @property UserRole[] $userRoles
 */
class Role extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = '_role';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_role';

    /**
     * @var array
     */
    protected $fillable = ['create_date', 'role_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRoles()
    {
        return $this->hasMany('App\UserRole', 'id_role', 'id_role');
    }
}
