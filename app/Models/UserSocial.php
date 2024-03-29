<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe Responsável por gerir Logins com Redes Sociais.
 *
 * Class UserSocial
 *
 * @package App\Models
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id Usuário
 * @property string $token
 * @property string|null $refreshToken
 * @property string|null $expiresIn
 * @property string|null $tokenSecret
 * @property int $socialId
 * @property string $nickname
 * @property string $name
 * @property string $email
 * @property string $avatar
 * @property-read \App\Models\User|null $users
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereExpiresIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereSocialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereTokenSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocial whereUserId($value)
 * @mixin \Eloquent
 */
class UserSocial extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'drive',
        'token',
        'refreshToken',
        'expiresIn',
        'tokenSecret',
        'socialId',
        'nickname',
        'name',
        'email',
        'avatar',
    ];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    /**
     * @param false $update
     * @param null $id
     */
    public static function rules($update = false, $id = null)
    {

    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function users()
    {
        return $this->hasOne(User::class);
    }

    /*
    |------------------------------------------------------------------------------------
    | Scopes
    |------------------------------------------------------------------------------------
    */

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */


}
