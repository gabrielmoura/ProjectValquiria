<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Pedido de Contato
 * Class ContactRequest
 *
 * @package App\Models
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $ip
 * @property string $address
 * @property string $email
 * @property string $tel
 * @property string $body
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest newQuery()
 * @method static \Illuminate\Database\Query\Builder|ContactRequest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ContactRequest withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ContactRequest withoutTrashed()
 * @mixin \Eloquent
 */
class ContactRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['address', 'email', 'tel', 'body', 'ip', 'name'];


    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */

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
