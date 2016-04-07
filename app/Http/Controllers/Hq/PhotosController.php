<?php

namespace App\Http\Controllers\Hq;


use Illuminate\Http\Request;

use App\Photo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;

class PhotosController extends Controller
{
    public function destroy(Photo $photo)
    {
        $delete = $photo->delete($photo->id);

        if ($delete > 0) {
            File::delete([
                $photo->path,
                $photo->path_thumb
            ]);
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'fail']);
    }
}
