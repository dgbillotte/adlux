<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Photo;

class PhotoController extends Controller {
    public function showPhoto($id) {
        if(! $photo = Photo::find($id)) {
            abort(404);
        }
        return view('view_photo', ['photo' => $photo]);
    }
}
