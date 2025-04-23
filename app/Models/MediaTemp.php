<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaTemp extends Model
{

    protected $table = 'media_temp';
    protected $fillable = ['filename', 'filepath', 'extension', 'mimetypes', 'disk', 'created_by', 'expires_at'];

    // Si usas autenticación, puedes querer autoasignar el usuario creador
    protected static function booted()
    {
        static::creating(function ($filepond) {
            $filepond->created_by = auth()->id() ?? null;
        });
    }
}
