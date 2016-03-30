<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;
use App\Http\Requests;

const THUMB_SIZE = 200;
const MED_SIZE = 600;
const LARGE_SIZE = 1200;

class ImageGenController extends Controller {

    public function genImage($image_spec) {

        if(! $parts = self::blowupSpec($image_spec)) {
            abort(404);
        }
        $filename = $parts[0];
        $x = $parts[1];
        $y = $parts[2];
        
        // see if the base image exists
        $base_path = 'image-store/';
        $file_path = $base_path  . $filename;
        if(! file_exists($file_path)) {
            abort(404);
        }

        $new_image_path = $base_path . $image_spec;

        // load base image, resize it & save it to disk
        self::resizeImage($file_path, $new_image_path, $x, $y);

        return response()->file($new_image_path);
    }

    protected static function resizeImage($orig_file, $new_file, $x, $y) {
        $image = new Imagick($orig_file);
        $image->thumbnailImage($x,$y);
        $image->writeImage($new_file);
    }

    protected static function blowupSpec($spec) {
        $pattern = '/^(.*)(_([^_]+))(\.[^.]+)$/';

        if(! preg_match($pattern, $spec, $matches)) {
            return false;
        }

        $name = $matches[1];
        $size_str = $matches[3];
        $ext = $matches[4];
        $filename = $name . $ext;

        $x = 0;
        $y = 0;
        // figure out size
        if(preg_match('/^(h|w)(\d+)$/', $size_str, $matches)) {
            $size = intval($matches[2]);
            if($matches[1] == 'h') { // fixed height
                $y = $size;
            } else { // fixed width
                $x = $size;
            }
        } elseif(preg_match('/^(\d+)$/', $size_str, $matches)) {
            // NOTE: !!!! this is begging to be DOS'd!!!!
            $x = intval($matches[1]);
        } elseif($size_str === 'thumb') {
            $x = THUMB_SIZE;
        } elseif($size_str === 'med') {
            $x = MED_SIZE;
        } elseif($size_str === 'large') {
            $x = LARGE_SIZE;
        } else {
            return false;
        }

        return [$filename, $x, $y];
    }
}
