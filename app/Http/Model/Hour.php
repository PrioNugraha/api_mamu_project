<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idHour
 * @property int $idBranch
 * @property string $seninOpen
 * @property string $seninClose
 * @property string $selasaOpen
 * @property string $selasaClose
 * @property string $rabuOpen
 * @property string $rabuClose
 * @property string $kamisOpen
 * @property string $kamisClose
 * @property string $jumatOpen
 * @property string $jumatClose
 * @property string $sabtuOpen
 * @property string $sabtuClose
 * @property string $mingguOpen
 * @property string $mingguClose
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
    protected $primaryKey = 'idHour';

    /**
     * @var array
     */
    protected $fillable = ['idBranch', 'seninOpen', 'seninClose', 'selasaOpen', 'selasaClose', 'rabuOpen', 'rabuClose', 'kamisOpen', 'kamisClose', 'jumatOpen', 'jumatClose', 'sabtuOpen', 'sabtuClose', 'mingguOpen', 'mingguClose'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchantBranch()
    {
        return $this->belongsTo('App\MerchantBranch', 'idBranch', 'idBranch');
    }
}
