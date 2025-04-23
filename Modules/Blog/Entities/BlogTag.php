<?php

namespace Modules\Blog\Entities;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Traits\AutoGenerateUuid;

class BlogTag extends Model
{
    use SoftDeletes, HasFactory,AutoGenerateUuid;

    public $table = 'blog_tags';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'color',
        'is_protected',
        'icon',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });

        static::deleting(function ($model) {
            //al eliminar modificamos el name para que no se repita
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

    public function posts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_post_tag', 'blog_tag_id', 'post_id');
    }
}
