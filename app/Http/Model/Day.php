<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_day
 * @property int $id_branch
 * @property boolean $jumat
 * @property boolean $kamis
 * @property boolean $minggu
 * @property boolean $rabu
 * @property boolean $sabtu
 * @property boolean $selasa
 * @property boolean $senin
 * @property MerchantBranch $merchantBranch
 */
class Day extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'day';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_day';

    /**
     * @var array
     */
    protected $fillable = ['id_branch', 'jumat', 'kamis', 'minggu', 'rabu', 'sabtu', 'selasa', 'senin'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchantBranch()
    {
        return $this->belongsTo('App\MerchantBranch', 'id_branch', 'id_branch');
    }
}
