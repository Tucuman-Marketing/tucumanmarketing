<?php

namespace Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecruitmentJobCandidates extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = "recruitment_job_candidates";

    public function candidate()
    {
        return $this->belongsTo(RecruitmentCandidates::class, 'candidate_id');
    }

    public function status()
    {
        return $this->belongsTo(RecruitmentCandidatesStatuses::class, 'candidate_status_id');
    }
}
