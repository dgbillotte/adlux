<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Imagick;

use App\Album;
use App\Photo;

class ImportImages extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gallery:import {album_id} {image_files*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        //
        $album_id = $this->argument('album_id');
        $image_files = $this->argument('image_files');

        if(! $album = Album::find($album_id)) {
            $this->error('Invalid album_id: ' . $album_id);
            die;
        }

        $photos = [];
        $photo_info = [];//'album_id' => $album_id];
        foreach($image_files as $file) {
            // $album->photos
            $image = new Imagick($file);
            $size = $image->getImageGeometry();
            // dd($size);
            // could get exif and other data here
            $photo_info['height'] = $size['height'];
            $photo_info['width'] = $size['width'];
            $photo_info['filename'] = basename($file);

            $image->writeImage('public/image-store/' . basename($file));
        
            $photos[] = new Photo($photo_info);
        }

        $album->photos()->saveMany($photos);
    }   
}
