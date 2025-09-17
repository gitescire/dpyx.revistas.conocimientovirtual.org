<?php

namespace App\Http\Controllers\Observations\Files;

use App\Http\Controllers\Controller;
use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Observation $observation, $file)
    {
        $fileUrl = collect($observation->files_paths)->where('file_name', $file)->first()['url'];
        $file_name = collect($observation->files_paths)->where('file_name', $file)->first()['file_name'];
        
        return response()->download(public_path('storage/observations/'.$file_name));
        // return Storage::disk('public')->download('/storage/observations/'.$file_name);
    }
}
