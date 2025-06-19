<?php

namespace App\Http\Controllers\API\Helpers;

use _Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function upload_image(Request $request)
    {

        $request->validate([
            'upload' => 'required|image',
        ]);

        $image = _Storage::upload('upload', 'ckeditor');

        return response()->json([
            'uploaded' => true,
            'url' => _Storage::uploads($image),
        ]);

    }
}
