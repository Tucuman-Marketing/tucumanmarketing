<?php

namespace Modules\Blog\Entities;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AutoGenerateUuid;

class BlogStatus extends Model
{
    use SoftDeletes, HasFactory;
    use AutoGenerateUuid;

    public $table = 'blog_statuses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'sort_order',
        'color',
        'is_protected',
        'icon',
        'created_at',
        'updated_at',
        'deleted_at',
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
}
