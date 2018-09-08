<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_hour
 * @property int $id_branch
 * @property string $jumat_close
 * @property string $jumat_open
 * @property string $kamis_close
 * @property string $kamis_open
 * @property string $minggu_close
 * @property string $minggu_open
 * @property string $rabu_close
 * @property string $rabu_open
 * @property string $sabtu_close
 * @property string $sabtu_open
 * @property string $selasa_close
 * @property string $selasa_open
 * @property string $senin_close
 * @property string $senin_open
 * @property MerchantBranch $merchantBranch
 */
class Hour extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'hour';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_hour';

    /**
     * @var array
     */
    protected $fillable = ['id_branch', 'jumat_close', 'jumat_open', 'kamis_close', 'kamis_open', 'minggu_close', 'minggu_open', 'rabu_close', 'rabu_open', 'sabtu_close', 'sabtu_open', 'selasa_close', 'selasa_open', 'senin_close', 'senin_open'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchantBranch()
    {
        return $this->belongsTo('App\MerchantBranch', 'id_branch', 'id_branch');
    }
}
