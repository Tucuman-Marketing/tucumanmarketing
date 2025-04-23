<?php

namespace Modules\CoreForm\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Traits\AutoGenerateUuid;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoreForm extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;
    use AutoGenerateUuid;

    protected $table = 'core_forms'; // Especifica el nombre de la tabla si no sigue la convención de Laravel

    protected $fillable = [
        'name',
        'css',
        'js',
        'html',
        'instruction',
        'create',
        'edit',
        'sort_order',
        'color',
    ];

     /*---------------------------------SCOPES-------------------------------*/
     public function getRouteKeyName()
     {
         return 'uuid';
     }
     /*---------------------------------SCOPES-------------------------------*/

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
