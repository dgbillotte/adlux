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

        return view('view_album', ['album' => $album, 'photos' => $album->photos]);
    }

    public function newAlbum() {
        return view('new_album');
    }

    public function createAlbum() {
        $album = new Album();

        // set the new album fields

        $album->save();

        return redirect('album/' . $album->id);
    }

    public function editAlbum($id) {
        $album = Album::find($id);
        return view('new_album', ['album' => $album]);
    }

    public function updateAlbum($id) {
        $album = Album::find($id);

        // update the album

        $album->save();

        return redirect('album/' . $album->id);
    }

    public function addPhotoForm($id) {
        $album = Album::find($id);

        return view('add_photo', ['album' => $album]);
    }

    public function addPhoto($id) {
        $album = Album::find($id);

        // add the photo stuff here...

        return redirect('album/' . $id);
    }

}
