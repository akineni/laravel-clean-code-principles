<?php

namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Services\FileStorage\DIPFileUploadService;
use Illuminate\Http\Request;

class DIPFileController extends Controller
{
    public function upload(Request $request, DIPFileUploadService $service)
    {
        $path = $service->handle($request->file('file'));

        return response()->json(['path' => $path]);
    }
}
