<?php

namespace Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Recruitment\Entities\RecruitmentCandidates;
use Modules\Recruitment\Entities\RecruitmentJobs;
use Modules\Recruitment\Entities\RecruitmentStatuses;
use App\Traits\AutoGenerateUuid;


class RecruitmentApplications extends Model
{
    use HasFactory, SoftDeletes,AutoGenerateUuid;

    protected $table = 'recruitment_applications';

    protected $fillable = [
        'uuid', 'candidate_id', 'job_id', 'status_id'
    ];

    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/

    public function candidate()
    {
        return $this->belongsTo(RecruitmentCandidates::class, 'candidate_id');
    }

    public function job()
    {
        return $this->belongsTo(RecruitmentJobs::class, 'job_id');
    }

    public function status()
    {
        return $this->belongsTo(RecruitmentStatuses::class, 'status_id');
    }


}
