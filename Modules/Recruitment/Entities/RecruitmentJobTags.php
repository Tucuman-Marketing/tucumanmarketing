<?php

namespace Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Recruitment\Entities\RecruitmentJobs;
use Modules\Recruitment\Entities\RecruitmentTags;
use App\Traits\AutoGenerateUuid;
use Illuminate\Support\Str;

class RecruitmentJobTags extends Model
{
    use HasFactory, SoftDeletes,AutoGenerateUuid;

    protected $table = 'recruitment_job_tags';

    protected $fillable = [
        'job_id', 'tag_id'
    ];

    // Asegúrate de que los timestamps estén habilitados
    public $timestamps = true;

    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/

    public function job()
    {
        return $this->belongsTo(RecruitmentJobs::class, 'job_id')
                    ->withTimestamps();
    }

    public function tag()
    {
        return $this->belongsTo(RecruitmentTags::class, 'tag_id')
                    ->withTimestamps();
    }

}
