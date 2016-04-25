<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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

    public function createAlbum(Request $request) {
        $album = new Album();

        // set the new album fields
        $album->title = $request->input('title', 'default title');
        $album->description = $request->input('description', 'default description');

        // dd([$request->all(), $album]);

        $user = Auth::user();
        $user->albums()->save($album);

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

    public function addPhotosForm($id) {
        $album = Album::find($id);

        return view('add_photos', ['album' => $album]);
    }

    public function addPhotos(Request $request, $id) {
        $album = Album::find($id);

        // add the photo stuff here...
        foreach($request->allFiles() as $name=>$file) {

            if($file->isValid()) {
                $file->move('foobar', $file->getClientOriginalName());
            }

        }


        return "yeah!";
    }

}
