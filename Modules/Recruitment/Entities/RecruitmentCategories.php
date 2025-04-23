<?php

namespace Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Recruitment\Entities\RecruitmentJobs;
use App\Traits\AutoGenerateUuid;
use DateTimeInterface;
use Illuminate\Support\Str;
class RecruitmentCategories extends Model
{
    use HasFactory, SoftDeletes,AutoGenerateUuid;

    protected $table = 'recruitment_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'icon',
        'color',
        'sort_order',
        'is_protected'
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });

        static::deleting(function ($model) {
            //al eliminar modificamos el title para que no se repita
            $model->name = $model->name . ' - ' . $model->uuid;
            $model->slug = $model->name;
            $model->save();
        });
    }

    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function jobs()
    {
        return $this->hasMany(RecruitmentJobs::class, 'category_id');
    }


}
