<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;
use ImageService;
use Storage;
use Illuminate\Http\File;

class Page extends Model 
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasRevisions;

    protected $fillable = [
        'published',
        'title',
        'description',
        'position',
        //'public',
        'featured',
        'publish_start_date',
        'publish_end_date',
        'template',
        'meta_title',
        'meta_description',
        'page_url'
    ];

    // uncomment and modify this as needed if you use the HasTranslation trait
    public $translatedAttributes = [
         'title',
         //'description',
         'active',
    ];
    
    // uncomment and modify this as needed if you use the HasSlug trait
    public $slugAttributes = [
         'title',
    ];

    // add checkbox fields names here (published toggle is itself a checkbox)
    public $checkboxes = [
        'published'
    ];

    // uncomment and modify this as needed if you use the HasMedias trait
    public $mediasParams = [
        'hero_image' => [
            'default' => [
                 [
                     'name' => 'landscape',
                     'ratio' => 16 / 9,
                 ],
             ],
             'mobile' => [
                 [
                     'name' => 'mobile',
                     'ratio' => 1,
                 ],
             ],
        ]
     ];
     
    

    public function getMetaTitleAttribute($value){
        if (!isset($value) || $value == ""){
            return site_settings('meta_title_prefix') . $this->title . site_settings('meta_title_suffix');
        }
        return $value;
    }

    public function getMetaDescriptionAttribute($value){
        if (!isset($value) || $value == ""){
            if (!isset($this->description) || $this->description == ""){
                return site_settings('default_meta_description','meta');
            }
            return $this->description;
        }
        return $value;
    }

    public function getCloudImage($role, $crop, $params = [], $size = 'small'){
        $path = $this->image($role, $crop, $params);
        if ( strpos($path, 'data:image') !== false ){
            return 'oops';
        }
        $source = config()->get('twill.glide.source');
        $base_url = config()->get('twill.glide.base_url');
        $cache_path = config()->get('twill.glide.cache');
        $sizes = [
            'large' => 2000,
            'medium' => 1000,
            'small' => 500,
            'thumb' => 100
        ];
        $crop_param = $this->mediasParams[$role][$crop][0];
        $cdnUrl  = config('filesystems.disks.s3.url');
        $image_path = explode('?' , $path)[0];
        $filename = basename($image_path);
        $size = $sizes[$size];
        $image = ImageService::getImageAsBase64($image_path, ['w' => $size * $crop_param['ratio'], 'h' => $size]);
        $image_cache_path = ImageService::getCachePath($image_path, ['w' => $size * $crop_param['ratio'], 'h' => $size]);
        $file = new File($cache_path . '/' . $image_cache_path);
        $s3_path = $image_cache_path . '/' . $filename;
        if (!Storage::disk('s3')->exists($s3_path)){
            Storage::disk('s3')->putFileAs($image_cache_path . '/', $file, $filename, 'public');
        }
        return $cdnUrl . "/" . $s3_path; 
    }


    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            // ... code here
        });

        self::created(function($model){
            // ... code here
        });

        self::updating(function($model){
            // ... code here
        });

        self::updated(function($model){
            $source = config()->get('twill.glide.source');
            $base_url = config()->get('twill.glide.base_url');
            $cache_path = config()->get('twill.glide.cache');
            foreach($model->mediasParams as $role => $params){
                foreach($params as $crop => $crop_params){
                    foreach($crop_params as $crop_param){
                        //get image info...
                        $image_path = $model->image($role, $crop, $crop_params);
                        if ( strpos($image_path, 'data:image') !== false ){
                            return;
                        }
                        $image_path = explode('?' , $image_path)[0];
                        $filename = basename($image_path);
                        $sizes = [
                            'large' => 2000,
                            'medium' => 1000,
                            'small' => 500,
                            'thumb' => 100
                        ];
                        foreach($sizes as $size){
                            $image = ImageService::getImageAsBase64($image_path, ['w' => $size * $crop_param['ratio'], 'h' => $size]);
                            $image_cache_path = ImageService::getCachePath($image_path, ['w' => $size * $crop_param['ratio'], 'h' => $size]);
                            $file = new File($cache_path . '/' . $image_cache_path);
                            $s3_path = $image_cache_path . '/' . $filename;
                            if (!Storage::disk('s3')->exists($s3_path)){
                                Storage::disk('s3')->putFileAs($image_cache_path . '/', $file, $filename, 'public');
                            }
                        }
                    }
                }
                //$image = $model->image($role, $params[0]);
                //var_dump($image);
                //$imagePath = $this->glide->makeImage($imageSource, ['w' => $width]);
            }
        });

        self::deleting(function($model){
            // ... code here
        });

        self::deleted(function($model){
            // ... code here
        });
    }

}
