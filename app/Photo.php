<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
    protected $table = 'photo';
    protected $fillable = ['title', 'description', 'height', 'width', 'filename'];

    public function album() {
        return $this->belongsTo('App\Album');
    }



    public function getThumbnailURL() {
        return '/image-store/' . preg_replace('/\.([^.]+)$/', "_thumb.$1", $this->filename);
    }

    public function getMedURL() {
        return '/image-store/' . preg_replace('/\.([^.]+)$/', "_med.$1", $this->filename);
    }

    public function getLargeURL() {
        return '/image-store/' . preg_replace('/\.([^.]+)$/', "_large.$1", $this->filename);
    }

    public function getFullsizeURL() {
        return '/image-store/' . $this->filename;
    }
}
