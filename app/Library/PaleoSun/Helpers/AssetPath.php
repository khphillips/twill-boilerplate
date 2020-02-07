<?php 

namespace App\Library\PaleoSun\Helpers;

class AssetPath {

	public function __construct(){

	}

	/**
     * Get the path to a versioned Mix file.
     *
     * @param  string  $path
     * @param  string  $manifestDirectory
     * @return \Illuminate\Support\HtmlString|string
     *
     * @throws \Exception
     */
    public static function asset_path($path)
    {
        //$mixPath = mix($path, $manifestDirectory);
        $cdnUrl  = config('filesystems.disks.s3.url');
        $env     = config('app.env');
        // Reference CDN assets only in production or staging environemnt.
        // In other environments, we should reference locally built assets.
        if ($cdnUrl && ($env === 'production' || $env === 'staging')) {
            return $cdnUrl . "/" . $path;
        }
        return '/storage/' . $path;
    }


    public static function image_path($path)
    {
        echo public_path() . '/' . $path;
        exit();
        //$mixPath = mix($path, $manifestDirectory);
        $cdnUrl  = config('filesystems.disks.s3.url');
        $env     = config('app.env');
        // Reference CDN assets only in production or staging environemnt.
        // In other environments, we should reference locally built assets.
        if ($cdnUrl && ($env === 'production' || $env === 'staging')) {
            return $cdnUrl . "/" . $path;
        }
        return '/storage/' . $path;
    }


}