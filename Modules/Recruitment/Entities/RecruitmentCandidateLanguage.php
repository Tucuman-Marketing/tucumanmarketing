<?php

namespace Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Recruitment\Entities\RecruitmentCandidates;

class RecruitmentCandidateLanguage extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = "recruitment_candidates_lenguages";

    public function candidate()
    {
        return $this->belongsTo(RecruitmentCandidates::class, 'candidate_id', 'id');
    }

}
