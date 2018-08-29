<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $idUser
 * @property string $userName
 * @property string $password
 * @property string $prevPassword
 * @property string $lastLogin
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
    protected $primaryKey = 'idUser';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['userName', 'password', 'prevPassword', 'lastLogin'];

}
