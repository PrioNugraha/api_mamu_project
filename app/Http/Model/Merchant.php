<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idMerchant
 * @property string $idUser
 * @property string $name
 * @property string $description
 * @property string $createDate
 * @property User $user
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
    protected $primaryKey = 'idMerchant';

    /**
     * @var array
     */
    protected $fillable = ['idUser', 'name', 'description', 'createDate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'idUser', 'idUser');
    }
}
