<?php
namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Storage;
class CustomPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        $folderName = class_basename($media->model);
        $path = $folderName . '/' . $media->model_id . '/';

        // Verifica si la carpeta existe, si no, la crea
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        return $path;
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media) . 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive-images/';
    }
}
