<?php

namespace Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Recruitment\Entities\RecruitmentJobs;
use Modules\Recruitment\Entities\RecruitmentApplications;
use App\Traits\AutoGenerateUuid;
use DateTimeInterface;

class RecruitmentStatuses extends Model
{
    use HasFactory, SoftDeletes,AutoGenerateUuid;

    protected $table = 'recruitment_statuses';

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

    // Definir constantes para los estados
    const STATUS_CERRADA = 1;
    const STATUS_ABIERTA = 2;

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

    public function jobs()
    {
        return $this->hasMany(RecruitmentJobs::class, 'status_id');
    }

    public function applications()
    {
        return $this->hasMany(RecruitmentApplications::class, 'status_id');
    }


}
