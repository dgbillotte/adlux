<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Album;

class AlbumController extends Controller {
    public function showAllAlbums() {
        $albums = Album::all();
        return view('all_albums', ['albums' => $albums]);
    }

    public function showAlbum($id) {
        $album = Album::find($id);
        // dd($album->photos);
        return view('view_album', ['album' => $album, 'photos' => $album->photos]);
    }

    public function newAlbum() {
        return view('new_album');
    }
}
