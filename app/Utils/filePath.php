<?php


if (!function_exists('dynamicAsset')) {
    function dynamicAsset(string $path): string
    {
        if (DOMAIN_POINTED_DIRECTORY == 'public') {
            $position = strpos($path, 'public/');
            $result = $path;
            if ($position === 0) {
                $result = preg_replace('/public/', '', $path, 1);
            }
        } else {
            $result = $path;
        }
        return asset($result);
    }
}
