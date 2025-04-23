<?php
namespace App\Traits;

use Uuid;

trait AutoGenerateUuid {
    public static function bootAutoGenerateUuid() {
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Uuid::generate(4);
            }
        });
    }
}
