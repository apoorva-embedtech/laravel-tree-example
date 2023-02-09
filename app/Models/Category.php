<?php

namespace App\Models;

use Fureev\Trees\NestedSetTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Fureev\Trees\Config\Base;
use Webpatser\Uuid\Uuid;

class Category extends Model
{
    use HasFactory;
    use NestedSetTrait;
    protected $guarded = ['id'];
    protected $keyType = 'string';

    /**
     *  Setup model event hooks
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate(4)->string;
        });

    }

    protected static function buildTreeConfig(): Base
    {
        $config= new Base(true);
        //$config->parent()->setType('uuid'); <-- `parent type` set up automatically from `$model->keyType`

        return $config;
    }
}
