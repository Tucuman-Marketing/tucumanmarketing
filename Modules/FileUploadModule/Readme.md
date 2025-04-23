# Carga de imagnes y/o archivos
 input  
 $fields = ['image_header','image_header_edit', 'image_gallery','image_gallery_edit', 'file','file_edit', 'file_multiple','file_multiple_edit'];

# Usar Spatie Media Library

class Blog extends Model implements HasMedia
{
    use InteractsWithMedia;


# en Boot del modelo 

public static function boot()
{
    parent::boot();
    static::saving(function ($modelo) {
        $modelo->slug = Str::slug($modelo->title);
    });

    static::deleting(function ($modelo) {
    $modelo->clearMediaCollection('image_header');
    $modelo->clearMediaCollection('image_gallery');
    $modelo->clearMediaCollection('file');
    $modelo->clearMediaCollection('file_multiple');

});
}


# luego realizar estos cambios en el modelo
public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image_header')->singleFile();
        $this->addMediaCollection('image_gallery');
        $this->addMediaCollection('file')->singleFile();
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



# Ejemplos del create HTML

```html
<!--  Image Simple  -->
<input type="file" name="image_header" id="image_header" />
<p class="help-block">{{ $errors->first('image_header.*') }}</p>
<input type="hidden" name="image_header_id" id="image_header_id">

<!--  Image multiple -->
<input type="file" name="image_gallery" multiple/>
<p class="help-block">{{ $errors->first('image_gallery.*') }}</p>
<input type="hidden" name="image_gallery_ids" id="image_gallery_ids">

<!--  File Simple  -->
<input type="file" name="file" />
<p class="help-block">{{ $errors->first('file.*') }}</p>
<input type="hidden" name="file_id" id="file_id">

<!--  File Multiple  -->
<input type="file_multiple" name="file_multiple" multiple/>
<p class="help-block">{{ $errors->first('file_multiple.*') }}</p>
<input type="hidden" name="file_multiple_ids" id="file_multiple_ids">
```


# Ejemplos del Edit HTML
{{-- Imagen de Portada --}}
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Imagen de portada
                </div>
            </div>
            <div class="card-body">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                    <div class="card custom-card product-card" >
                        <div class="card-body d-flex justify-content-center align-items-center flex-wrap">

                            @if($data->getFirstMedia('image_header'))
                            <div class="image-container position-relative">
                                <span class="border border-primary border-container rounded">
                                <img src="{{ asset($data->getFirstMedia('image_header')->url)}}" alt="..." class="img-fluid  rounded" >
                                </span>
                                <div class="close-image position-absolute">
                                    <button type="button" data-id="{{ $data->getFirstMedia('image_header')->id }}" class="btn btn-delete" onclick="deleteMedia({{ $data->getFirstMedia('image_header')->id }}, this)"><i class="ri-close-line"></i></button>
                                </div>
                            </div>
                            @else
                            <div class="image-container position-relative">
                                <span class="border border-primary border-container rounded">
                                <img src="{{ asset('theme-admin/velvet/assets/images/sin-imagen.jpg') }}" alt="..." class="img-fluid  rounded" >
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                 <!--  Image Simple  -->
                 <input type="file" name="image_header_edit" id="image_header_edit" />
                 <p class="help-block">{{ $errors->first('image_header_edit.*') }}</p>
                 <input type="hidden" name="image_header_edit_id" id="image_header_edit_id">

            </div>
        </div>
    </div>
</div>

{{-- Galeria de Imagenes --}}
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Galeria de Imagenes
                </div>
            </div>
            <div class="card-body">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                    <div class="card custom-card product-card" >
                        <div class="card-body d-flex justify-content-center align-items-center flex-wrap">

                            @if($data->getMedia('image_gallery')->count() > 0)
                                @foreach ($data->getMedia('image_gallery') as $image )
                                    <div class="image-container position-relative">
                                        <span class="border border-primary border-container rounded">
                                        <img src="{{ asset($image->url)}}" alt="..." class="img-fluid  rounded" >
                                        </span>
                                        <div class="close-image position-absolute">
                                            <button type="button" data-id="{{ $image->id }}" class="btn btn-delete" onclick="deleteMedia({{ $image->id }}, this)"><i class="ri-close-line"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="image-container position-relative">
                                    <span class="border border-primary border-container rounded">
                                    <img src="{{ asset('theme-admin/velvet/assets/images/sin-imagen.jpg') }}" alt="..." class="img-fluid  rounded" >
                                    </span>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                  <!--  Image multiple -->
                  <input type="file" name="image_gallery_edit" multiple/>
                  <p class="help-block">{{ $errors->first('image_gallery_edit.*') }}</p>
                  <input type="hidden" name="image_gallery_edit_ids" id="image_gallery_edit_ids">

            </div>
        </div>
    </div>
</div>

{{-- Cargar Archivo --}}
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Cargar Archivo
                </div>
            </div>
            <div class="card-body">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                    <div class="card custom-card product-card" >
                        <div class="card-body d-flex justify-content-center align-items-center flex-wrap">
                            @if($data->getFirstMedia('file'))
                                <div class="image-container position-relative">
                                    <span class="border border-primary border-container rounded">
                                        @if($data->getFirstMedia('file')->mime_type == 'application/pdf')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/pdf.svg') }}" alt="PDF" class="img-fluid rounded">
                                        @elseif($data->getFirstMedia('file')->mime_type == 'application/zip')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/zip.svg') }}" alt="ZIP" class="img-fluid rounded">
                                        @elseif($data->getFirstMedia('file')->mime_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/word.svg') }}" alt="word" class="img-fluid rounded">
                                        @elseif($data->getFirstMedia('file')->mime_type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/xlsx.svg') }}" alt="XLSX" class="img-fluid rounded">
                                        @elseif($data->getFirstMedia('file')->mime_type == 'application/x-rar-compressed')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/rar.svg') }}" alt="RAR" class="img-fluid rounded">
                                        @endif
                                        </span>
                                    <div class="close-image position-absolute">
                                        <button type="button" data-id="{{ $data->getFirstMedia('file')->id }}" class="btn btn-delete" onclick="deleteMedia({{ $data->getFirstMedia('file')->id }}, this)"><i class="ri-close-line"></i></button>
                                    </div>
                                </div>
                            @else
                                <div class="image-container position-relative">
                                    <span class="border border-primary border-container rounded">
                                    <img src="{{ asset('theme-admin/velvet/assets/images/sin-imagen.jpg') }}" alt="..." class="img-fluid  rounded" >
                                    </span>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                    <!--  File Simple  -->
                    <input type="file_edit" name="file_edit" />
                    <p class="help-block">{{ $errors->first('file_edit.*') }}</p>
                    <input type="hidden" name="file_edit_id" id="file_edit_id">

            </div>
        </div>
    </div>
</div>

{{-- Cargar Multiples Archivos --}}
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Cargar Multiples Archivos
                </div>
            </div>
            <div class="card-body">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                    <div class="card custom-card product-card" >
                        <div class="card-body d-flex justify-content-center align-items-center flex-wrap">

                            @if($data->getMedia('file_multiple')->count() > 0)
                                @foreach ($data->getMedia('file_multiple') as $file )
                                    <div class="image-container position-relative">
                                        <span class="border border-primary border-container rounded">

                                        @if($file->mime_type == 'application/pdf')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/pdf.svg') }}" alt="PDF" class="img-fluid rounded">
                                        @elseif($file->mime_type == 'application/zip')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/zip.svg') }}" alt="ZIP" class="img-fluid rounded">
                                        @elseif($file->mime_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/word.svg') }}" alt="word" class="img-fluid rounded">
                                        @elseif($file->mime_type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/xlsx.svg') }}" alt="XLSX" class="img-fluid rounded">
                                        @elseif($file->mime_type == 'application/x-rar-compressed')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/rar.svg') }}" alt="RAR" class="img-fluid rounded">
                                        @endif
                                        </span>
                                        <div class="close-image position-absolute">
                                            <button type="button" data-id="{{ $file->id }}" class="btn btn-delete" onclick="deleteMedia({{ $file->id }}, this)"><i class="ri-close-line"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="image-container position-relative">
                                    <span class="border border-primary border-container rounded">
                                    <img src="{{ asset('theme-admin/velvet/assets/images/sin-imagen.jpg') }}" alt="..." class="img-fluid  rounded" >
                                    </span>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                    <!--  File Multiple  -->
                    <input type="file_multiple_edit" name="file_multiple_edit" multiple/>
                    <p class="help-block">{{ $errors->first('file_multiple_edit.*') }}</p>
                    <input type="hidden" name="file_multiple_edit_ids" id="file_multiple_edit_ids">

            </div>
        </div>
    </div>
</div>

```
