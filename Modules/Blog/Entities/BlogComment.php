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

class BlogComment extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;
    use AutoGenerateUuid;

    public $table = 'blog_comments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'post_id',
        'user_id',
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     public static function boot()
     {
     }

     /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/




    //====================IMAGE , FILE , UPLOADS====================
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 80, 80);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
        $this->addMediaConversion('listheader')->fit('crop', 650, 500);
        $this->addMediaConversion('header')->fit('crop', 850, 530);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image_header');
        $this->addMediaCollection('image_gallery');
        $this->addMediaCollection('file');
        $this->addMediaCollection('file_multiple');
    }

    public function getImageHeaderAttribute()
    {
        $media = $this->getMedia('image_header')->first();
        return $media ? $media->url : null;
    }

    public function getImageGalleryAttribute($value)
    {
        return $this->getMedia('image_gallery')->map(function ($media) {
            return $media->url;
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
