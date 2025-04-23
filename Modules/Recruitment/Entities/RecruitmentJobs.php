<?php

namespace Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Recruitment\Entities\RecruitmentCategories;
use Modules\Recruitment\Entities\RecruitmentStatuses;
use Modules\Recruitment\Entities\RecruitmentSkills;
use Modules\Recruitment\Entities\RecruitmentApplications;
use Modules\Recruitment\Entities\RecruitmentTags;
use App\Traits\AutoGenerateUuid;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class RecruitmentJobs extends Model
{
    use HasFactory, SoftDeletes, AutoGenerateUuid;

    protected $table = 'recruitment_jobs';

    protected $fillable = [
        'uuid',
        'title',
        'slug',
        'description',
        'work_mode',
        'work_type',
        'category_id',
        'status_id'
    ];

    const WORK_TYPE_CATALOG = [
        'full_time' => 'Tiempo completo',
        'part_time' => 'Medio tiempo',
        'other' => 'Otro'
    ];

    const WORK_MODE_CATALOG = [
        'presential' => 'Presencial',
        'remote' => 'Remoto',
        'hybrid' => 'Híbrido'
    ];

    //Status closed
    const STATUS_CLOSED = 1;
    const STATUS_ACTIVE = 2;


    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->slug = Str::slug($model->title);
        });

        static::deleting(function ($model) {
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

    public function getSlugIdAttribute()
    {
        if ($this->slug) {
            return $this->slug . '?id=' . $this->id;
        } else {
            return $this->id;
        }
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

    public function category()
    {
        return $this->belongsTo(RecruitmentCategories::class, 'category_id');
    }

    public function status()
    {
        return $this->belongsTo(RecruitmentStatuses::class, 'status_id');
    }

    public function skills()
    {
        return $this->belongsToMany(RecruitmentSkills::class, 'recruitment_job_skills', 'job_id', 'skill_id');
    }

    public function candidates()
    {
        return $this->belongsToMany(RecruitmentCandidates::class, 'recruitment_job_candidates', 'job_id', 'candidate_id');
    }

    public function tags()
    {
        return $this->belongsToMany(RecruitmentTags::class, 'recruitment_job_tags', 'job_id', 'tag_id');
    }

    //DESCRIPTION SHORT
    public function getShortDescriptionAttribute()
    {
        $limit = 100; // Longitud por defecto

        if ($this->isMobile()) {
            $limit = 30; // Longitud para dispositivos móviles
        }

        return $this->limitHtml($this->description, $limit);
    }

    protected function isMobile()
    {
        // Detección básica de móvil (puedes mejorar esta lógica según tus necesidades)
        return preg_match('/Mobile|Android|Silk/', $_SERVER['HTTP_USER_AGENT']);
    }

    private function limitHtml($text, $limit)
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML(mb_convert_encoding($text, 'HTML-ENTITIES', 'UTF-8'));
        $totalLength = 0;
        $output = '';

        foreach ($dom->getElementsByTagName('body')->item(0)->childNodes as $node) {
            if ($totalLength >= $limit) {
                break;
            }

            $nodeLength = mb_strlen($node->textContent);
            if ($totalLength + $nodeLength > $limit) {
                $node->textContent = mb_substr($node->textContent, 0, $limit - $totalLength);
            }

            $output .= $dom->saveHTML($node);
            $totalLength += $nodeLength;
        }

        return $output;
    }

}
