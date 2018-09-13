<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $created_at
 * @property string $email
 * @property string $token
 * @property string $updated_at
 */
class PasswordReset extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['email', 'token'];

}
