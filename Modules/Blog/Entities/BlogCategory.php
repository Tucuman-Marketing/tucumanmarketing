<?php

namespace Modules\Blog\Entities;


use DateTimeInterface;
use Modules\Blog\Entities\BlogPost;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Traits\AutoGenerateUuid;
use Illuminate\Support\Str;

class BlogCategory extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;
    use AutoGenerateUuid;

    public $table = 'blog_categories';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'image_filename',
        'thumbnail',
        'thumbnail_filename',
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

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function posts()
    {
        return $this->hasMany(BlogPost::class, 'category_id', 'id');
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
}
