<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titolo',
        'testo',
        'autore',
        'foto',
        'data_pubblicazione',
    ];

    public function infoPost() {
        return $this->hasOne('App\InfoPost');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
