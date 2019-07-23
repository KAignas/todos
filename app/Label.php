<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = ['name', 'color'];

    public static function getDefaultLabels()
    {
       return trans('labels');
    }
}
