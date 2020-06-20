<?php

namespace App\Http\Controllers\actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UtilitiesController extends Controller
{
    public function fileNameToStore($image)
    {
        //Get file name with extension
        $filenameWithExt = $image->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Join if there's spave in filename
        $new_arr = explode(" ", $filename);
        if ($new_arr) {
            $filename == join("-", $new_arr);
        }
        // Get just ext
        $extension = $image->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        //Upload image
        $path = $image->storeAs('public/pictures', $fileNameToStore);
        return $fileNameToStore;
    }
    public function documentNameToStore($document)
    {
        //Get file name with extension
        $filenameWithExt = $document->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Join if there's spave in filename
        $new_arr = explode(" ", $filename);
        if ($new_arr) {
            $filename == join("-", $new_arr);
        }
        // Get just ext
        $extension = $document->getClientOriginalExtension();
        //Filename to store
        $documentNameToStore = $filename . '_' . time() . '.' . $extension;
        //Upload document
        $path = $document->storeAs('public/ebooks', $documentNameToStore);
        return $documentNameToStore;
    }
    public function videoNameToStore($video)
    {
        //Get file name with extension
        $filenameWithExt = $video->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Join if there's spave in filename
        $new_arr = explode(" ", $filename);
        if ($new_arr) {
            $filename == join("-", $new_arr);
        }
        // Get just ext
        $extension = $video->getClientOriginalExtension();
        //Filename to store
        $videoNameToStore = $filename . '_' . time() . '.' . $extension;
        //Upload video
        $path = $video->storeAs('public/videos', $videoNameToStore);
        return $videoNameToStore;
    }
}
