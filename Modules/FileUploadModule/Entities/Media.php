<?php
namespace Modules\FileUploadModule\Entities;

use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;
use Illuminate\Support\Facades\Storage;

class Media extends SpatieMedia
{
    //table
    protected $table = 'media';

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($media) {
            $path = $media->url;
            $path = str_replace('storage/', '', $path);
            // Elimina solo el archivo específico, no la carpeta
            if (Storage::disk($media->disk)->exists($path)) {
                Storage::disk($media->disk)->delete($path);
            }
        });
    }
}
