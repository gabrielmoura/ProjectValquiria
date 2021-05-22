<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategoryPhoto
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $image
 * @property int|null $category_id
 * @property-read \App\Models\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryPhoto whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryPhoto whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryPhoto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CategoryPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['image'];
    protected $table = 'category_photos';

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        if (!$update) {
            return [
                'image' => 'required',
            ];
        }
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
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
