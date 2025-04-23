<?php

namespace Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AutoGenerateUuid;
use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


use Modules\Recruitment\Entities\RecruitmentCandidatesStatuses;


class RecruitmentCandidates extends Model implements HasMedia
{
    use HasFactory, SoftDeletes,AutoGenerateUuid ,InteractsWithMedia;

    protected $table = 'recruitment_candidates';

    protected $fillable = [
        'uuid',
        'name',
        'last_name',
        'email',
        'phone',
        'cv',
        'gender',
        'tittle',
        'education_level',
        'education_state',
        'linkedin',
        'description',
        'status_id'
    ];


    //status catalog
    const STATUS_PENDING = 1;
    const STATUS_REJECTED = 2;
    const STATUS_PRESENTED = 3;


    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/

    public function jobs()
    {
        return $this->belongsToMany(RecruitmentJobs::class, 'recruitment_job_candidates', 'candidate_id', 'job_id');
    }

    public function statusByJob()
    {
        return $this->hasMany(RecruitmentJobCandidates::class, 'candidate_id');
    }

    public function jobCandidates()
    {
        return $this->hasMany(RecruitmentJobCandidates::class, 'candidate_id');
    }

    public function languages()
    {
        return $this->hasMany(RecruitmentCandidateLanguage::class, 'candidate_id', 'id');
    }

    public function skills()
    {
        return $this->belongsToMany(RecruitmentSkills::class, 'recruitment_candidates_skills', 'candidate_id', 'skill_id');
    }

    public function status()
    {
        return $this->belongsTo(RecruitmentCandidatesStatuses::class, 'status_id', 'id');
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->last_name;
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
