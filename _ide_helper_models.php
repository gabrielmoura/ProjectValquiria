<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property string $slug
 * @property-read \App\Models\ProductPhoto|null $ProductPhotos
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CategoryPhoto[] $photos
 * @property-read int|null $photos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
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
 */
	class CategoryPhoto extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Client
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $address Endereço
 * @property string|null $name
 * @property string|null $last_name
 * @property int|null $cep
 * @property int|null $tel telefone
 * @property string|null $birth_date Data de nascimento
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUserId($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $description
 * @property string $body
 * @property string $price
 * @property string $slug
 * @property int $published
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductDispatcher[] $dispatcher
 * @property-read int|null $dispatcher_count
 * @property-read mixed $full
 * @property-read mixed $image
 * @property-read mixed $thumb
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductPhoto[] $photos
 * @property-read int|null $photos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
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
 */
	class ProductDispatcher extends \Eloquent {}
}

namespace App\Models{
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
 */
	class ProductPhoto extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name Apelido
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property int|null $adm IsAdmin?
 * @property string|null $avatar
 * @property string|null $doc
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $password_temporary Senha Temporária
 * @property string|null $stripe_id
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property string|null $trial_ends_at
 * @property-read \App\Models\Client $client
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserOrder[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAdm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePasswordTemporary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
 */
	class UserOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserSocial
 *
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
 */
	class UserSocial extends \Eloquent {}
}

