<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Responsável pelo método de envio.
 *
 * Class ProductDispatcher
 *
 * @package App\Models
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $method Método de envio
 * @property string $type Tipo
 * @property string $format Formato
 * @property string $weight Peso
 * @property string $length Comprimento
 * @property string $height Altura
 * @property string $width Largura
 * @property string $diameter Diâmetro
 * @property int $product_id
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher whereDiameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductDispatcher whereWidth($value)
 * @mixin \Eloquent
 */
class ProductDispatcher extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', //Tipo
        'format', //Formato
        'weight', //Peso
        'length', //Comprimento
        'height', //Altura
        'width', //Largura
        'diameter' //Diâmetro
    ];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        return [

            'type' => 'required',
            'format' => 'required',
            'weight' => 'required',
            'length' => 'required',
            'height' => 'required',
            'width' => 'required',
            'diameter' => 'required'
        ];
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
