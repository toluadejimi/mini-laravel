<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

/**
 * Serves files from storage/app/public when the request reaches Laravel.
 * Use this if Apache returns 403 for /storage/* (often FollowSymLinks off with a symlink).
 * If public/storage is a working symlink, the web server usually serves files without hitting PHP.
 */
class StoragePublicController extends Controller
{
    public function show(string $path)
    {
        $path = str_replace(['..', '\\'], '', $path);
        $path = ltrim($path, '/');
        if ($path === '') {
            abort(404);
        }

        $full = storage_path('app/public/'.$path);

        if (! File::isFile($full)) {
            abort(404);
        }

        return response()->file($full);
    }
}
