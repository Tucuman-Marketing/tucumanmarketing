<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Media
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string|null $uuid
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string|null $mime_type
 * @property string $disk
 * @property string|null $conversions_disk
 * @property int $size
 * @property string $manipulations
 * @property string $custom_properties
 * @property string|null $generated_conversions
 * @property string|null $responsive_images
 * @property int|null $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $url
 * @property int|null $temp
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCollectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereConversionsDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCustomProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereGeneratedConversions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereManipulations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereResponsiveImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Media withoutTrashed()
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string|null $uuid
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $model
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $module
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \jeremykenedy\LaravelRoles\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUuid($value)
 */
	class Permission extends \Eloquent implements \jeremykenedy\LaravelRoles\Contracts\PermissionHasRelations {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string|null $uuid
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property int $level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \jeremykenedy\LaravelRoles\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUuid($value)
 */
	class Role extends \Eloquent implements \jeremykenedy\LaravelRoles\Contracts\RoleHasRelations {}
}

namespace App\Models{
/**
 * Class RoleUser
 *
 * @property int $id
 * @property string|null $uuid
 * @property int $role_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Role $role
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser withoutTrashed()
 */
	class RoleUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $id
 * @property string $uuid
 * @property string $name
 * @property string|null $lastname
 * @property string $email
 * @property string|null $lote
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $re_password
 * @property string|null $confirmed
 * @property string|null $confirmation_code
 * @property string|null $image
 * @property string|null $image_filename
 * @property string|null $thumbsnail
 * @property string|null $thumbsnail_filename
 * @property string|null $dni
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $country
 * @property string|null $province
 * @property string|null $city
 * @property string|null $cp
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read mixed $full_name
 * @property-read mixed $photo
 * @property-read mixed $translated
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \jeremykenedy\LaravelRoles\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Modules\SubscriptionsModule\Entities\Subscription|null $subscription
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Vehicles\Entities\UserDataVehicles> $userDataVehicles
 * @property-read int|null $user_data_vehicles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \jeremykenedy\LaravelRoles\Models\Permission> $userPermissions
 * @property-read int|null $user_permissions_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImageFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereThumbsnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereThumbsnailFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUuid($value)
 */
	class User extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable, \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Blog\Entities{
/**
 * Modules\Blog\Entities\Blog
 *
 * @property int $id
 * @property string|null $uuid
 * @property string $title
 * @property string $news_date
 * @property string|null $slug
 * @property string|null $content
 * @property string|null $content2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $category_id
 * @property int|null $status_id
 * @property int|null $user_id
 * @property-read \Modules\Blog\Entities\BlogCategory|null $category
 * @property-read mixed $file
 * @property-read mixed $files
 * @property-read mixed $image_gallery
 * @property-read mixed $image_header
 * @property-read mixed $public_full_date
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Modules\Blog\Entities\BlogStatus|null $status
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Blog\Entities\BlogTag> $tags
 * @property-read int|null $tags_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContent2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereNewsDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog withoutTrashed()
 */
	class Blog extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Blog\Entities{
/**
 * Modules\Blog\Entities\BlogCategory
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $image_filename
 * @property string|null $thumbnail
 * @property string|null $thumbnail_filename
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Blog\Entities\Blog> $categoryBlogs
 * @property-read int|null $category_blogs_count
 * @property-read mixed $image
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereImageFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereThumbnailFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory withoutTrashed()
 */
	class BlogCategory extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Blog\Entities{
/**
 * Modules\Blog\Entities\BlogStatus
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus withoutTrashed()
 */
	class BlogStatus extends \Eloquent {}
}

namespace Modules\Blog\Entities{
/**
 * Modules\Blog\Entities\BlogTag
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTag whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTag withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTag withoutTrashed()
 */
	class BlogTag extends \Eloquent {}
}

namespace Modules\CashFlow\Entities{
/**
 * Modules\CashFlow\Entities\CashFlow
 *
 * @property-read \Modules\CashFlow\Entities\CashFlowCategory|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlowDetail> $details
 * @property-read int|null $details_count
 * @property-read \app\Models\Employee|null $employee
 * @property-read \app\Models\Employee|null $employeeSec1
 * @property-read \app\Models\Employee|null $employeeSec2
 * @property mixed $date
 * @property-read mixed $unit_category_unit_subcategory_name
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $module
 * @property-read \Modules\CashFlow\Entities\CashFlowSector|null $sector
 * @property-read \Modules\ServiceModule\Entities\Service|null $service
 * @property-write mixed $helper1_hours
 * @property-write mixed $helper2_hours
 * @property-write mixed $operator_hours
 * @property-read \Modules\CashFlow\Entities\CashFlowSubCategory|null $subcategory
 * @property-read \Modules\CashFlow\Entities\CashFlowSubSector|null $subsector
 * @property-read \Modules\CashFlow\Entities\CashFlowUnit|null $unit
 * @property-read \Modules\CashFlow\Entities\CashFlowUnitCategory|null $unitCategory
 * @property-read \Modules\CashFlow\Entities\CashFlowUnitSubCategory|null $unitSubcategory
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow query()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow withoutTrashed()
 */
	class CashFlow extends \Eloquent {}
}

namespace Modules\CashFlow\Entities{
/**
 * Modules\CashFlow\Entities\CashFlowCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlow> $cashflow
 * @property-read int|null $cashflow_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlowSubCategory> $subcategories
 * @property-read int|null $subcategories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlowUnit> $units
 * @property-read int|null $units_count
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowCategory withoutTrashed()
 */
	class CashFlowCategory extends \Eloquent {}
}

namespace Modules\CashFlow\Entities{
/**
 * Modules\CashFlow\Entities\CashFlowDetail
 *
 * @property-read \Modules\CashFlow\Entities\CashFlow|null $cashflow
 * @property-read \Modules\ServiceModule\Entities\Service|null $service
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowDetail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowDetail withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowDetail withoutTrashed()
 */
	class CashFlowDetail extends \Eloquent {}
}

namespace Modules\CashFlow\Entities{
/**
 * Modules\CashFlow\Entities\CashFlowSector
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlow> $cashflow
 * @property-read int|null $cashflow_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlowSubSector> $subsectors
 * @property-read int|null $subsectors_count
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSector newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSector newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSector onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSector query()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSector withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSector withoutTrashed()
 */
	class CashFlowSector extends \Eloquent {}
}

namespace Modules\CashFlow\Entities{
/**
 * Modules\CashFlow\Entities\CashFlowSubCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlow> $cashFlows
 * @property-read int|null $cash_flows_count
 * @property-read \Modules\CashFlow\Entities\CashFlowCategory|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSubCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSubCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSubCategory withoutTrashed()
 */
	class CashFlowSubCategory extends \Eloquent {}
}

namespace Modules\CashFlow\Entities{
/**
 * Modules\CashFlow\Entities\CashFlowSubSector
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlow> $cashFlows
 * @property-read int|null $cash_flows_count
 * @property-read \Modules\CashFlow\Entities\CashFlowSector|null $sector
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSubSector newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSubSector newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSubSector onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSubSector query()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSubSector withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowSubSector withoutTrashed()
 */
	class CashFlowSubSector extends \Eloquent {}
}

namespace Modules\CashFlow\Entities{
/**
 * Modules\CashFlow\Entities\CashFlowUnit
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlow> $cashFlows
 * @property-read int|null $cash_flows_count
 * @property-read \Modules\CashFlow\Entities\CashFlowUnitCategory|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlowUnitDetail> $unitDetails
 * @property-read int|null $unit_details_count
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnit query()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnit withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnit withoutTrashed()
 */
	class CashFlowUnit extends \Eloquent {}
}

namespace Modules\CashFlow\Entities{
/**
 * Modules\CashFlow\Entities\CashFlowUnitCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlow> $cashflow
 * @property-read int|null $cashflow_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlowUnitSubCategory> $subcategories
 * @property-read int|null $subcategories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlowUnitDetail> $unitDetails
 * @property-read int|null $unit_details_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlowUnit> $units
 * @property-read int|null $units_count
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitCategory withoutTrashed()
 */
	class CashFlowUnitCategory extends \Eloquent {}
}

namespace Modules\CashFlow\Entities{
/**
 * Modules\CashFlow\Entities\CashFlowUnitDetail
 *
 * @property-read \Modules\CashFlow\Entities\CashFlowUnit|null $unit
 * @property-read \Modules\CashFlow\Entities\CashFlowUnitCategory|null $unitCategory
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitDetail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitDetail withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitDetail withoutTrashed()
 */
	class CashFlowUnitDetail extends \Eloquent {}
}

namespace Modules\CashFlow\Entities{
/**
 * Modules\CashFlow\Entities\CashFlowUnitSubCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlow> $cashflow
 * @property-read int|null $cashflow_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CashFlow\Entities\CashFlowUnitDetail> $unitDetails
 * @property-read int|null $unit_details_count
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitSubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitSubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitSubCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitSubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitSubCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlowUnitSubCategory withoutTrashed()
 */
	class CashFlowUnitSubCategory extends \Eloquent {}
}

namespace Modules\FileUploadModule\Entities{
/**
 * Modules\FileUploadModule\Entities\Media
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string|null $uuid
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string|null $mime_type
 * @property string $disk
 * @property string|null $conversions_disk
 * @property int $size
 * @property array $manipulations
 * @property array $custom_properties
 * @property array|null $generated_conversions
 * @property array|null $responsive_images
 * @property int|null $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $url
 * @property int|null $temp
 * @property-read mixed $extension
 * @property-read mixed $human_readable_size
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @property-read mixed $original_url
 * @property-read mixed $preview_url
 * @property-read mixed $type
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, static> all($columns = ['*'])
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCollectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereConversionsDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCustomProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereGeneratedConversions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereManipulations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereResponsiveImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUuid($value)
 */
	class Media extends \Eloquent {}
}

namespace Modules\PosModule\Entities{
/**
 * Modules\PosModule\Entities\Washeds
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $user_id
 * @property int|null $vehicle_id
 * @property int|null $subscription_id
 * @property int|null $plan_id
 * @property string|null $type
 * @property int|null $duration
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Modules\SubscriptionsModule\Entities\SubscriptionPlan|null $plan
 * @property-read \Modules\SubscriptionsModule\Entities\Subscription|null $subscription
 * @property-read \App\Models\User|null $user
 * @property-read \Modules\Vehicles\Entities\UserDataVehicles|null $userVehicle
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds query()
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds whereSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds whereVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Washeds withoutTrashed()
 */
	class Washeds extends \Eloquent {}
}

namespace Modules\ServiceModule\Entities{
/**
 * Modules\ServiceModule\Entities\Service
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string|null $description
 * @property string $price
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Service withoutTrashed()
 */
	class Service extends \Eloquent {}
}

namespace Modules\Setting\Entities{
/**
 * Modules\Setting\Entities\SettingCompany
 *
 * @property string $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $addres
 * @property string|null $phone
 * @property string|null $whatsapp
 * @property string|null $email
 * @property string|null $link_facebook
 * @property string|null $link_twitter
 * @property string|null $link_youtube
 * @property string|null $link_google
 * @property string|null $link_instagram
 * @property string|null $logo_imagen
 * @property string|null $logo_filename
 * @property string|null $favicon_imagen
 * @property string|null $favicon_filename
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany query()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereAddres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereFaviconFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereFaviconImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereLinkFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereLinkGoogle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereLinkInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereLinkTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereLinkYoutube($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereLogoFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereLogoImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingCompany whereWhatsapp($value)
 */
	class SettingCompany extends \Eloquent {}
}

namespace Modules\Setting\Entities{
/**
 * Modules\Setting\Entities\SettingEmail
 *
 * @property string $id
 * @property string $uuid
 * @property string $driver
 * @property string $host
 * @property string $port
 * @property string $address
 * @property string|null $name
 * @property string $encryption
 * @property string $username
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $translated
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail query()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail whereDriver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail whereEncryption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail whereHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail wherePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingEmail whereUuid($value)
 */
	class SettingEmail extends \Eloquent {}
}

namespace Modules\Setting\Entities{
/**
 * Modules\Setting\Entities\SettingPaymet
 *
 * @property string $id
 * @property string $uuid
 * @property string $public_key
 * @property string $private_key
 * @property string|null $access_token
 * @property string|null $percentage
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SettingPaymet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingPaymet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingPaymet query()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingPaymet whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingPaymet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingPaymet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingPaymet wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingPaymet wherePrivateKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingPaymet wherePublicKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingPaymet whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingPaymet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingPaymet whereUuid($value)
 */
	class SettingPaymet extends \Eloquent {}
}

namespace Modules\SubscriptionsModule\Entities{
/**
 * Modules\SubscriptionsModule\Entities\Subscription
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $user_id
 * @property int|null $subscription_plan_id
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $price
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $subscription_pay_id
 * @property int|null $user_vehicle_id
 * @property string $status
 * @property string|null $last_edited_by_user_at
 * @property string|null $next_edited_by_user_at
 * @property mixed|null $request
 * @property mixed|null $response
 * @property int|null $response_error
 * @property string|null $mp_subscriptionId
 * @property-read \Modules\SubscriptionsModule\Entities\SubscriptionPay|null $pay
 * @property-read \Modules\SubscriptionsModule\Entities\SubscriptionPlan|null $plan
 * @property-read \App\Models\User|null $user
 * @property-read \Modules\Vehicles\Entities\UserDataVehicles|null $userVehicle
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereLastEditedByUserAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereMpSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereNextEditedByUserAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereResponseError($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereSubscriptionPayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereSubscriptionPlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUserVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription withoutTrashed()
 */
	class Subscription extends \Eloquent {}
}

namespace Modules\SubscriptionsModule\Entities{
/**
 * Modules\SubscriptionsModule\Entities\SubscriptionPay
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $subscription_id
 * @property string|null $amount
 * @property string|null $payment_date
 * @property string|null $next_payment_date
 * @property string|null $payment_type
 * @property string|null $payment_preference_id
 * @property string|null $payment_method
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay whereNextPaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay wherePaymentPreferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay whereSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPay withoutTrashed()
 */
	class SubscriptionPay extends \Eloquent {}
}

namespace Modules\SubscriptionsModule\Entities{
/**
 * Modules\SubscriptionsModule\Entities\SubscriptionPlan
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $type
 * @property string|null $name
 * @property string|null $description
 * @property int|null $duration
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property mixed|null $request
 * @property mixed|null $response
 * @property int|null $response_error
 * @property int|null $price
 * @property int|null $frequency
 * @property string|null $frequency_type
 * @property int|null $repetitions
 * @property int|null $billing_day
 * @property int|null $billing_day_proportional
 * @property string|null $mp_planId
 * @property int|null $quantity_vehicles
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\ServiceModule\Entities\Service> $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereBillingDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereBillingDayProportional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereFrequencyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereMpPlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereQuantityVehicles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereRepetitions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereResponseError($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan withoutTrashed()
 */
	class SubscriptionPlan extends \Eloquent {}
}

namespace Modules\SubscriptionsModule\Entities{
/**
 * Modules\SubscriptionsModule\Entities\SubscriptionPlanService
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $subscription_plan_id
 * @property int|null $service_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService whereSubscriptionPlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanService withoutTrashed()
 */
	class SubscriptionPlanService extends \Eloquent {}
}

namespace Modules\Translations\Entities{
/**
 * Modules\Translations\Entities\MultilanguageEntitie
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string $original_text
 * @property int $original_language_id
 * @property array|null $translations
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Translations\Entities\MultilanguageTextContent|null $translation_for
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $translatableModel
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageEntitie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageEntitie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageEntitie query()
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageEntitie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageEntitie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageEntitie whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageEntitie whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageEntitie whereOriginalLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageEntitie whereOriginalText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageEntitie whereTranslations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageEntitie whereUpdatedAt($value)
 */
	class MultilanguageEntitie extends \Eloquent {}
}

namespace Modules\Translations\Entities{
/**
 * Modules\Translations\Entities\MultilanguageLanguage
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Translations\Entities\MultilanguageTextContent> $textContents
 * @property-read int|null $text_contents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Translations\Entities\MultilanguageTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageLanguage whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageLanguage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageLanguage whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageLanguage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageLanguage whereUpdatedAt($value)
 */
	class MultilanguageLanguage extends \Eloquent {}
}

namespace Modules\Translations\Entities{
/**
 * Modules\Translations\Entities\MultilanguageTextContent
 *
 * @property int $id
 * @property string $original_text
 * @property int $original_language_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Translations\Entities\MultilanguageLanguage $language
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Translations\Entities\MultilanguageTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTextContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTextContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTextContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTextContent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTextContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTextContent whereOriginalLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTextContent whereOriginalText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTextContent whereUpdatedAt($value)
 */
	class MultilanguageTextContent extends \Eloquent {}
}

namespace Modules\Translations\Entities{
/**
 * Modules\Translations\Entities\MultilanguageTranslation
 *
 * @property int $id
 * @property string $group
 * @property string $key
 * @property string $translations
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Translations\Entities\MultilanguageLanguage|null $language
 * @property-read \Modules\Translations\Entities\MultilanguageTextContent|null $textContent
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTranslation whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTranslation whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTranslation whereTranslations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MultilanguageTranslation whereUpdatedAt($value)
 */
	class MultilanguageTranslation extends \Eloquent {}
}

namespace Modules\Vehicles\Entities{
/**
 * Modules\Vehicles\Entities\UserDataVehicles
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $user_id
 * @property string|null $vehicle_plate
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $color
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string|null $deleted_at
 * @property string|null $type
 * @property string|null $description
 * @property-read mixed $photo
 * @property-read \Modules\SubscriptionsModule\Entities\Subscription|null $latestPaidSubscription
 * @property-read \Modules\SubscriptionsModule\Entities\Subscription|null $latestPendingSubscription
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Modules\SubscriptionsModule\Entities\Subscription|null $subscription
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDataVehicles whereVehiclePlate($value)
 */
	class UserDataVehicles extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

