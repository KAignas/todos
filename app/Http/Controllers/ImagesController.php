<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Image;

/**
 * Class ImagesController
 * @package App\Http\Controllers
 */
class ImagesController extends Controller
{
    /**
     * Get image and cache it for 10 minutes
     * @param $dir string
     * @param $filename string
     * @return image response
     */
    public function show($dir, $filename)
    {
        $src = Storage::get($dir.'/'.$filename);
        $image  = Image::cache(function( $image ) use ($src){
            return $image->make($src);
        }, 10, true);

        return $image->response();
    }
}
