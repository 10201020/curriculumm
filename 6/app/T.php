<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'user_id' => 'required',
        'body' => 'required',
    );
}