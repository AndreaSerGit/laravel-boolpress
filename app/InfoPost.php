<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPost extends Model
{
    
    protected $fillable = [
      'post_id',
      'stato_post',
      'stato_commenti'
    ] ;


    public $timestamps = false;
    
    public function post() {
        return $this->belongsTo('App\Post');
    }

}
