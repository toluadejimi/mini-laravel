<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

/**
 * Serves files from storage/app/public when present; if missing, proxies from BACKEND_URL
 * server-side so the browser only talks to this host (no backend host in Network tab).
 */
class StorageFallbackController extends Controller
{
    public function show(string $path)
    {
        $path = str_replace(['..', '\\'], '', $path);
        $path = ltrim($path, '/');
        if ($path === '') {
            abort(404);
        }

        $full = storage_path('app/public/'.$path);
        if (File::isFile($full)) {
            return response()->file($full);
        }

        $base = rtrim((string) config('app.backend_url'), '/');
        if ($base === '') {
            abort(404);
        }

        try {
            $remote = $base.'/storage/'.$path;
            $resp = Http::timeout(45)->connectTimeout(15)->get($remote);
            if (! $resp->successful()) {
                abort(404);
            }

            $contentType = $resp->header('Content-Type') ?: 'application/octet-stream';

            return response($resp->body(), 200)->header('Content-Type', $contentType);
        } catch (\Throwable) {
            abort(404);
        }
    }
}
