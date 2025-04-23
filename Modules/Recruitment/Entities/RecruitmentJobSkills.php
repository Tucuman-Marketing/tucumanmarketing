<?php

namespace Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Recruitment\Entities\RecruitmentJobs;
use Modules\Recruitment\Entities\RecruitmentSkills;
use App\Traits\AutoGenerateUuid;

class RecruitmentJobSkills extends Model
{
    use HasFactory, SoftDeletes,AutoGenerateUuid;

    protected $table = 'recruitment_job_skills';

    protected $fillable = [
        'uuid', 'job_id', 'skill_id', 'sort_order', 'is_protected'
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

    public function skill()
    {
        return $this->belongsTo(RecruitmentSkills::class, 'skill_id')
                    ->withTimestamps();
    }


}
