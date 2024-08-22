<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

// Get file from storage folder
if (! function_exists('storageLink')) {
    function storageLink($url, $type = 'default'): string
    {
        if ($url && Storage::disk(config('filesystems.default'))->exists($url)) {
            return Storage::disk(config('filesystems.default'))->url($url);
        }

        if ($type == 'user') {
            return asset('assets/backend/img/Favicon.png');
        }

        return asset('assets/frontend/images/Logo_main.png');
    }
}

// Check current route
if (! function_exists('routeIs')) {
    function routeIs($route): bool
    {
        return request()->routeIs($route);
    }
}

// Upload image and return the uploaded path
if (! function_exists('imageUploadHandler')) {
    function imageUploadHandler($image, $request_path = 'default', $size = null, $old_image = null): string
    {
        if (isset($old_image)) {
            if (Storage::disk(config('filesystems.default'))->exists($old_image)) {
                Storage::disk(config('filesystems.default'))->delete($old_image);
            }
        }

        $path = $image->store($request_path, config('filesystems.default'));

        if (isset($size)) {
            $request_size = explode('x', $size);
            $width = $request_size[0];
            $height = $request_size[1];

            $image = ImageManager::imagick()->read(Storage::disk(config('filesystems.default'))->get($path));
            $image->resizeDown($width, $height);
        }

        return $path;
    }
}

// Session flash
if (! function_exists('sendFlash')) {
    function sendFlash($message, $type = 'toast_success'): void
    {
        session()->flash($type, $message);
    }
}
