<?php

namespace  Modules\FileUploadModule\Http\Traits;

use Illuminate\Http\Request;

//MODELS
use App\Models\MediaTemp;

//LIBS
use Alert;
use RahulHaque\Filepond\Facades\Filepond;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Flasher\Prime\FlasherInterface;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait FileUploadingTrait
{

    // Propiedades para definir los campos del CKEditor y FilePond
    protected $ckeditorFields = ['content', 'content2'];
    protected $imageSingleFields = ['image_single'];
    protected $imageMultipleFields = ['image_multiple'];
    protected $fileSingleFields = ['file_single'];
    protected $fileMultipleFields = ['file_multiple'];
    protected $filepondFields;

    // Método de inicialización para configurar las propiedades
    public function initializeFileUploadingTrait()
    {
        $this->filepondFields = array_merge(
            $this->imageSingleFields,
            $this->imageMultipleFields,
            $this->fileSingleFields,
            $this->fileMultipleFields
        );
    }

    //Store en upload/temp
    public function storeFiles($request, $model, $ckeditorFields, $filepondFields)
    {
        foreach ($filepondFields as $field) {
            $fieldWithIds = $field . '_ids'; // Agregar sufijo '_ids' al campo
            $isMultiple = in_array($field, array_merge($this->imageMultipleFields, $this->fileMultipleFields));

            if ($request->has($fieldWithIds)) {
                $mediaTempIds = explode(',', $request->input($fieldWithIds));
                foreach ($mediaTempIds as $mediaTempId) {
                    $this->processMediaTemp($mediaTempId, $model, $this->getMediaCollection($field, $isMultiple));
                }
            }
        }

        // Procesar imágenes del CKEditor
         $this->processCKEditorImages($request, $model, $ckeditorFields);

    }

    //update en upload/temp
    public function updateFiles($request, $model, $ckeditorFields, $filepondFields)
    {

        foreach ($filepondFields as $field) {
            $fieldWithIds = $field . '_ids'; // Agregar sufijo '_ids' al campo
            $isMultiple = in_array($field, array_merge($this->imageMultipleFields, $this->fileMultipleFields));

            if ($request->has($fieldWithIds)) {
                $mediaTempIds = explode(',', $request->input($fieldWithIds));
                foreach ($mediaTempIds as $mediaTempId) {
                    $this->processMediaTemp($mediaTempId, $model, $this->getMediaCollection($field, $isMultiple));
                }
            }
        }

       // Procesar imágenes del CKEditor
       $this->processCKEditorImages($request, $model, $ckeditorFields);

       //eliminamos imagenes que no se usan
       $this->deleteUnusedImages($request, $model, $ckeditorFields);
    }

    protected function getMediaCollection($field, $isMultiple)
    {
        if ($isMultiple) {
            if (in_array($field, $this->imageMultipleFields)) {
                return 'image_gallery';
            } elseif (in_array($field, $this->fileMultipleFields)) {
                return 'file_multiple';
            }
        } else {
            if (in_array($field, $this->imageSingleFields)) {
                return 'image_header';
            } elseif (in_array($field, $this->fileSingleFields)) {
                return 'file';
            }
        }

        return null;
    }

    protected function processMediaTemp($mediaTempId, $model, $mediaCollection)
    {
        $mediaTemp = MediaTemp::find($mediaTempId);
        if ($mediaTemp && Storage::disk('public')->exists($mediaTemp->filepath)) {
            $mediaItem = $model->addMediaFromDisk($mediaTemp->filepath, 'public')
                ->toMediaCollection($mediaCollection);

            $fullUrl = $mediaItem->getFullUrl();
            $relativeUrl = str_replace(env('APP_URL') . '/', '', $fullUrl);
            $mediaItem->update(['url' => $relativeUrl]);
            $mediaItem->save();

            Storage::disk('public')->delete($mediaTemp->filepath);
            $mediaTemp->delete();
            $mediaItem->fresh();

        }
    }

    // Procesar imágenes del CKEditor al Crear o Editar
    private function processCKEditorImages($request, $model, $contentFields)
    {
        foreach ($contentFields as $field) {
            if ($request->has($field)) {
                $content = $request->input($field);
                preg_match_all('/<img[^>]+src="([^">]+)"/', $content, $matches);
                $imageUrls = $matches[1];

                foreach ($imageUrls as $url) {
                    $pathInfo = pathinfo($url);
                    $relativePath = 'uploads/temp/' . $pathInfo['basename'];

                    $mediaTemp = MediaTemp::where('filepath', $relativePath)->first();
                    if ($mediaTemp && Storage::disk('public')->exists($mediaTemp->filepath)) {
                        $mediaItem = $model->addMediaFromDisk($mediaTemp->filepath, 'public')
                                            ->toMediaCollection('ckeditor');

                        $fullUrl = $mediaItem->getFullUrl();
                        $relativeUrl = str_replace(env('APP_URL') . '/', '', $fullUrl);
                        $mediaItem->update(['url' => $relativeUrl]);
                        $mediaItem->save();

                        // Reemplazar la URL temporal por la URL final en el contenido
                        $content = str_replace($url, $fullUrl, $content);

                        Storage::disk('public')->delete($mediaTemp->filepath);
                        $mediaTemp->delete();
                    }
                }

                // Actualizar el contenido en el modelo
                $model->$field = $content;
                $model->save();
            }
        }
    }

    //Eliminar imagenes no usadas en ckeditor al editar
    private function deleteUnusedImages($request, $model, $contentFields)
    {
        $usedImageNames = [];
        // Obtener todos los nombres de las imágenes usadas en los contenidos
        foreach ($contentFields as $field) {
            if ($request->has($field)) {
                $content = $request->input($field);
                preg_match_all('/<img[^>]+src="([^">]+)"/', $content, $matches);
                foreach ($matches[1] as $url) {
                    $pathInfo = pathinfo($url);
                    $usedImageNames[] = str_replace(' ', '-', $pathInfo['basename']); // Estándar: reemplazar espacios con guiones
                }
            }
        }
        // Obtener todas las imágenes asociadas al modelo
        $allImages = $model->getMedia('ckeditor');

        foreach ($allImages as $image) {
            $imageName = $image->file_name;
            if (!in_array($imageName, $usedImageNames)) {
                // Convertir a ruta relativa para Storage
                $relativePath = str_replace('storage/', '', $image->url);
                // Eliminar el archivo físico
                if (Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->delete($relativePath);
                } else {
                }
                // Actualizar el registro en la base de datos (puedes actualizar algún campo, p. ej. 'is_deleted')
            } else {
            }
        }
    }



}
