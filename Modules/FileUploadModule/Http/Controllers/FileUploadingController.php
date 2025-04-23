<?php

namespace  Modules\FileUploadModule\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;

//MODELS
use App\Models\MediaTemp;

//LIBS
use Alert;
use RahulHaque\Filepond\Facades\Filepond;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Flasher\Prime\FlasherInterface;
use Modules\FileUploadModule\Entities\Media;

class FileUploadingController extends Controller
{
    /**
     * * metodos AJAX storeMedia , processFile , deleteMedia  para el llamado ajax del componente FilePond.
     * * Campos a utilizar en el front-end: image_header, image_header_edit, image_gallery, image_gallery_edit, file, file_edit, file_multiple, file_multiple_edit
     */
    public function storeMedia(Request $request)
    {

        $field = $request->input('field');
        $isMultiple = $request->input('is_multiple');

        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = uniqid() . '_' . trim($file->getClientOriginalName());
            $extension = $file->getClientOriginalExtension();
            $mimetype = $file->getMimeType();
            $path = $file->storeAs('uploads/temp', $filename, 'public');

            $mediaTemp = MediaTemp::create([
                'filename' => $filename,
                'filepath' => $path,
                'extension' => $extension,
                'mimetypes' => $mimetype,
                'disk' => 'public',
                'expires_at' => Carbon::now()->addDays(1)
            ]);

            return response()->json([
                'status' => 'success',
                'media_temp_id' => $mediaTemp->id,
                'field' => $field,
                'is_multiple' => $isMultiple
            ]);
        }

        return response()->json(['status' => 'error', 'message' => 'No file uploaded'], 400);
    }

    /**
     * * Metodo AJAX para eliminar una imagen en el edit "X" ,de la base de datos y del almacenamiento
     */
    public function deleteMedia(Request $request)
    {
        $mediaId = $request->input('media_id');
        $media = Media::find($mediaId);
        if ($media) {
            Storage::disk('public')->delete($media->url);
            $media->delete();
            return response()->json(['status' => 'success', 'message' => 'Imagen eliminada correctamente.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'No se encontró la imagen.'], 404);
        }
    }

    /**
     * * Metodo AJAX para eliminar una imagen del componente FilePond
     */
    public function deleteMediaComponent(Request $request)
    {
        $mediaTempId = $request['filename'];
        $mediaTemp = MediaTemp::find($mediaTempId);
        if ($mediaTemp) {
            $filePath = $mediaTemp->filepath;
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
                $mediaTemp->delete();
                return response()->json(['status' => 'success', 'media_temp_id' => $mediaTempId, 'field' => $request->input('field'), 'is_multiple' => $request->input('is_multiple')]);
            }
        }
        return response()->json(['status' => 'error', 'message' => 'File not found'], 400);
    }

    /**
     * *  Metodo AJAX para cargar imagenes del ckeditor tanto create como edit
     */
    public function storeCKEditorImages(Request $request)
    {
        $file = $request->file('upload_ckeditor');
        $filename = uniqid() . '_' . trim($file->getClientOriginalName());
        $extension = $file->getClientOriginalExtension();
        $mimetype = $file->getMimeType();
        $path = $file->storeAs('uploads/temp', $filename, 'public');

        $mediaTemp = MediaTemp::create([
            'filename' => $filename,
            'filepath' => $path,
            'extension' => $extension,
            'mimetypes' => $mimetype,
            'disk' => 'public',
            'expires_at' => Carbon::now()->addDays(1)
        ]);

        return response()->json(['status' => 'success', 'media_temp_id' => $mediaTemp->id, 'url' => Storage::url($path)], Response::HTTP_CREATED);
    }

}
