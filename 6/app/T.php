<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T extends Model
{
    protected $table = 'posts';
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'user_id' => 'required',
        'body' => 'required',
    );

    public function histories()
    {
      return $this->hasMany('App\History');

    }
}