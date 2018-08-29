<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idDays
 * @property int $idBranch
 * @property boolean $senin
 * @property boolean $selasa
 * @property boolean $rabu
 * @property boolean $kamis
 * @property boolean $jumat
 * @property boolean $sabtu
 * @property boolean $minggu
 * @property MerchantBranch $merchantBranch
 */
class Days extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idDays';

    /**
     * @var array
     */
    protected $fillable = ['idBranch', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchantBranch()
    {
        return $this->belongsTo('App\MerchantBranch', 'idBranch', 'idBranch');
    }
}
