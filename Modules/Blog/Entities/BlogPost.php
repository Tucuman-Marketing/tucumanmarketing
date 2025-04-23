<?php

namespace Modules\Blog\Entities;

use Carbon\Carbon;
use App\Models\User;
use DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\Storage;
use Modules\Blog\Entities\BlogTag;
use Modules\Blog\Entities\BlogStatus;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\BlogCategory;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Traits\AutoGenerateUuid;

class BlogPost extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;
    use AutoGenerateUuid;

    public $table = 'blog_posts';

    protected $dates = [
        'news_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'published_at',
    ];

    protected $fillable = [
        'title',
        'user_id',
        'news_date',
        'slug',
        'content',
        'content2',
        'category_id',
        'status_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'published_at',
    ];


     //Generacion automatica del slug
     public static function boot()
     {
         parent::boot();
         static::saving(function ($model) {
             $model->slug = Str::slug($model->title);
         });

         static::deleting(function ($model) {
            $model->clearMediaCollection('image_header');
            $model->clearMediaCollection('image_gallery');
            $model->clearMediaCollection('file');
            $model->clearMediaCollection('file_multiple');
            $model->getMedia('ckeditor')->each(function ($media) {
                $path = Str::replaceFirst('storage/', '', $media->url);
                Storage::disk('public')->delete($path);
                $media->delete();
            });

            //al eliminar modificamos el title para que no se repita
            $model->title = $model->title . ' - ' . $model->uuid;
            $model->slug = $model->title;
            $model->save();
        });
     }

    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/

     //RouteBinding para buscar tanto por id como por slug
     public function resolveRouteBinding($value, $field = null)
     {
         $field = $field ?? (is_numeric($value) ? 'id' : 'slug');
         return $this->where($field, $value)->firstOrFail();
     }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getNewsDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setNewsDateAttribute($value)
    {
        $this->attributes['news_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPublicFullDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['news_date'])->translatedFormat('d F Y');
    }

    public function getFormattedShortDateAttribute()
    {
        if($this->attributes['created_at'] == null) {
            return '';
        }

        $value = $this->attributes['created_at'];
        Carbon::setLocale('es');
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value);

        return $date->isoFormat('DD MMM YYYY');
    }

    public function getPublishedAtReadableAttribute()
    {
        if($this->attributes['published_at'] == null) {
            return '';
        }

        $value = $this->attributes['published_at'];
        Carbon::setLocale('es');
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value);

        return $date->isoFormat('DD MMM YYYY');
    }

    //content short
    public function getContentShortAttribute()
    {
        $plainTextContent = strip_tags(nl2br($this->content));
        $shortenedContent = Str::limit($plainTextContent, 30, '...');
        return $shortenedContent;
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class, 'blog_post_tag', 'post_id', 'blog_tag_id');
    }

    public function status()
    {
        return $this->belongsTo(BlogStatus::class, 'status_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }








    //====================IMAGE , FILE , UPLOADS====================
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10)
            ->nonQueued();

        $this->addMediaConversion('preview')
            ->width(800)
            ->height(600)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image_header');
        $this->addMediaCollection('image_gallery');
        $this->addMediaCollection('file');
        $this->addMediaCollection('file_multiple');
    }

    public function getImageHeaderAttribute($conversion = null)
    {
        $media = $this->getMedia('image_header')->first();
        if ($media) {
            $url = $conversion ? $media->getUrl($conversion) : $media->getUrl();
            $relativeUrl = strstr($url, '/storage'); // Devuelve la parte de la URL desde "/storage" en adelante
            return url('/') . '/' . ltrim($relativeUrl, '/'); // Construye una URL absoluta
        }
        return url('theme-admin/velvet/assets/images/sin-imagen.jpg'); // Retorna una URL absoluta para la imagen predeterminada
    }


    public function getImageGalleryAttribute($value)
    {
        $mediaItems = $this->getMedia('image_gallery');

        if ($mediaItems->isEmpty()) {
            return [url('theme-admin/velvet/assets/images/sin-imagen.jpg')];
        }

        return $mediaItems->map(function ($media) {
            $relativeUrl = strstr($media->getUrl(), '/storage'); // Devuelve la parte de la URL desde "/storage" en adelante
            return url('/') . '/' . ltrim($relativeUrl, '/'); // Construye una URL absoluta
        });
    }

    public function getFileAttribute($value)
    {
        $media = $this->getMedia('file')->first();
        return $media ? $media->url : null;
    }

    public function getFilesAttribute($value)
    {
        return $this->getMedia('files')->map(function ($media) {
            return $media->url;
        });
    }
    //====================IMAGE , FILE , UPLOADS====================

}
