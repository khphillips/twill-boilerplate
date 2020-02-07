<?php

use App\Library\PaleoSun\Helpers\AssetPath;
use A17\Twill\Repositories\SettingRepository;

if (! function_exists('asset_path')) {
    function asset_path($path, $manifestDirectory = '') {
        return AssetPath::asset_path($path, $manifestDirectory);
    }
}

if (! function_exists('site_settings')) {
    function site_settings($key, $section = null) {
    	if(isset($section)){
    		return app(SettingRepository::class)->byKey($key, $section);
    	}
        return app(SettingRepository::class)->byKey($key);
    }
}