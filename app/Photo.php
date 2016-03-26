<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
    protected $table = 'photo';

    public function album() {
        return $this->belongsTo('App\Album');
    }

    public function getThumbnailURL() {
        return '/knife1_thumb.jpg';
    }

    public function getMedURL() {
        return '/knife1_med.jpg';
    }

    public function getFullsizeURL() {
        return '/knife1.jpg';
    }
}
