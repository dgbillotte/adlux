<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Photo;

class Album extends Model {
    protected $table = 'album';
    
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function photos() {
        return $this->hasMany('App\Photo');
    }

    public function numPhotos() {
        return count($this->photos);
    }
}
