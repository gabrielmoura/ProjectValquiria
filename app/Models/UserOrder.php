<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserOrder
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $reference
 * @property string|null $pagseguro_code
 * @property int|null $pagseguro_status
 * @property string $items
 * @property int $user_id
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrder whereItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrder wherePagseguroCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrder wherePagseguroStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrder whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrder whereUserId($value)
 * @mixin \Eloquent
 */
class UserOrder extends Model
{
    use HasFactory;

    protected $fillable = ['reference', 'pagseguro_status', 'pagseguro_code', 'store_id', 'items'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        return [
            'name' => 'required',
        ];
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class);
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
