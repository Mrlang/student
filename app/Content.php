<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [     //字段白名单,在插入数据库前可手动改动的
        'con','recv_id','send_id','send_name','recv_name','create_at','updated_at'
    ];
}
