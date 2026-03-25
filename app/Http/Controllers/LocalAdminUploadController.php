<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Stores admin uploads on this app’s public disk (same origin as the Blade UI).
 * Registered before the /api proxy so uploads stay on this server.
 */
class LocalAdminUploadController extends Controller
{
    public function category(Request $request)
    {
        $validated = $request->validate([
            'file' => ['required', 'image', 'max:10240'],
        ]);

        $path = $validated['file']->store('category_images', 'public');

        return response()->json([
            'url' => '/storage/'.$path,
        ]);
    }

    public function product(Request $request)
    {
        $validated = $request->validate([
            'file' => ['required', 'image', 'max:10240'],
        ]);

        $path = $validated['file']->store('product_images', 'public');

        return response()->json([
            'url' => '/storage/'.$path,
        ]);
    }

    public function siteLogo(Request $request)
    {
        $validated = $request->validate([
            'file' => ['required', 'file', 'mimes:png,jpg,jpeg,webp,svg', 'max:5120'],
        ]);

        $path = $validated['file']->store('site', 'public');

        return response()->json([
            'url' => '/storage/'.$path,
        ]);
    }
}
