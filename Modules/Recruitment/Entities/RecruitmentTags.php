<?php

namespace Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Recruitment\Entities\RecruitmentJobs;
use App\Traits\AutoGenerateUuid;
use DateTimeInterface;
use Illuminate\Support\Str;
class RecruitmentTags extends Model
{
    use HasFactory, SoftDeletes,AutoGenerateUuid;

    protected $table = 'recruitment_tags';

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

    const COLOR_CATALOG = [
        'red' => '#FF0000',
        'blue' => '#0000FF',
        'green' => '#008000',
        'yellow' => '#FFFF00',
        'orange' => '#FFA500',
        'purple' => '#800080',
        'black' => '#000000',
        'white' => '#FFFFFF',
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
        return $this->belongsToMany(RecruitmentJobs::class, 'recruitment_job_tags', 'tag_id', 'job_id');
    }


}
