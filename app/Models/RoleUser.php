<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 * 
 * @property Role $role
 *
 * @package App\Models
 */
class RoleUser extends Model
{
	use SoftDeletes;
	protected $guarded = [];

	protected $casts = [
		'role_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'role_id',
		'user_id'
	];

	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
