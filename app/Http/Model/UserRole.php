<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_user_role
 * @property int $id_role
 * @property int $id_user
 * @property string $create_date
 * @property Role $role
 * @property User $user
 */
class UserRole extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = '_user_role';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_user_role';

    /**
     * @var array
     */
    protected $fillable = ['id_role', 'id_user', 'create_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Role', 'id_role', 'id_role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id_user');
    }
}
