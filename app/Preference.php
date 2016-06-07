<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $fillable = [     //字段白名单,在插入数据库前可手动改动的
        'id','like1','like2','like3','like4'
    ];
}
