<?php

namespace Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Recruitment\Entities\RecruitmentCandidates;
use App\Traits\AutoGenerateUuid;
use DateTimeInterface;

class RecruitmentCandidatesStatuses extends Model
{
    use HasFactory,SoftDeletes,AutoGenerateUuid;

    protected $table = 'recruitment_candidates_statuses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uuid', 'name', 'icon', 'color', 'sort_order', 'is_protected'
    ];

    const COLOR_CATALOG = [
        'red' => '#FF0000',
        'blue' => '#0000FF',
        'green' => '#008000',
        'yellow' => '#FFFF00',
        'orange' => '#FFA500',
        'purple' => '#800080',
        'black' => '#000000',
        'white' => '#FFFFFF',
    ];

    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function candidates()
    {
        return $this->hasMany(RecruitmentCandidates::class, 'status_id');
    }

    public function candidatesByJob()
    {
        return $this->hasMany(RecruitmentCandidates::class, 'candidate_status_id');
    }
}
