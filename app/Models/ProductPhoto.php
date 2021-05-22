<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductPhoto
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image
 * @property string|null $thumb
 * @property string|null $full
 * @property int|null $product_id
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPhoto whereFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPhoto whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPhoto whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPhoto whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPhoto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'thumb', 'full'];


    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {

    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function product()
    {
        return $this->belongsTo(Product::class);
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
