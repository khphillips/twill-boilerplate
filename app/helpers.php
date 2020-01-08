<?php

use App\Library\PaleoSun\Helpers\AssetPath;

if (! function_exists('asset_path')) {
    function asset_path($path, $manifestDirectory = '') {
        return AssetPath::asset_path($path, $manifestDirectory);
    }
}