<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

// Traits
use App\Traits\AutoGenerateUuid;
use OwenIt\Auditing\Contracts\Auditable;
use Modules\Translations\Traits\TraitTranslate;

//import module ticket entitie staff
use Modules\Tickets\Entities\TicketStaff;

//Module UserDataVehicle
use Modules\Vehicles\Entities\UserDataVehicles;
//Subscription
use Modules\SubscriptionsModule\Entities\Subscription;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

use App\Notifications\ResetPasswordNotification;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class User extends Authenticatable implements Auditable, HasMedia
{

    use HasApiTokens,
    HasFactory,
    Notifiable,
    AutoGenerateUuid,
    HasRoleAndPermission,
    TraitTranslate,
    InteractsWithMedia;


    use \OwenIt\Auditing\Auditable;


    protected $dates = ['deleted_at'];
    // public $incrementing = false;
    protected $keyType = 'string';
    protected $hidden = ['password', 'remember_token',];
    public $translatedAttributes = [];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'lote',
        'password',
    ];

    protected static function boot() {
        parent::boot();//se agrega esto para que funcione el boot de la clase padre y de otros traits
        static::saved(function ($model) {
                // Manejar las traducciones solo para nuevos registros
                $model->createLanguageTranslations($model);
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
        });
    }



    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
      return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/




    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
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
