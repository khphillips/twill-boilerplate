<?php

return [
	'enabled' => [
        'buckets' => true,
        'settings' => true
    ],
	'media_library' => [
        //'disk' => 's3',
        //'endpoint_type' => env('MEDIA_LIBRARY_ENDPOINT_TYPE', 's3'),
        'cascade_delete' => env('MEDIA_LIBRARY_CASCADE_DELETE', true),
        'local_path' => env('MEDIA_LIBRARY_LOCAL_PATH'),
        'image_service' => env('MEDIA_LIBRARY_IMAGE_SERVICE', 'A17\Twill\Services\MediaLibrary\Glide'),
        'acl' => env('MEDIA_LIBRARY_ACL', 'public-read'),
        'filesize_limit' => env('MEDIA_LIBRARY_FILESIZE_LIMIT', 50),
        'allowed_extensions' => ['svg', 'jpg', 'gif', 'png', 'jpeg'],
        'init_alt_text_from_filename' => true,
        'translated_form_fields' => false,
    ],
    'buckets' => [
        'homepage' => [
            'name' => 'Home',
            'buckets' => [
                'home_features' => [
                    'name' => 'Home Features',
                    'bucketables' => [
                        [
                            'module' => 'pages',
                            'name' => 'Pages',
                            'scopes' => ['published' => true],
                        ],
                    ],
                    'max_items' => 10,
                ],
            ],
        ],
        'settings' => [
            'name' => 'Home',
            'buckets' => [
                'settings_features' => [
                    'name' => 'Settings Features',
                    'bucketables' => [
                        [
                            'module' => 'pages',
                            'name' => 'Pages',
                            'scopes' => ['published' => true],
                        ],
                    ],
                    'max_items' => 10,
                ],
            ],
        ],
    ],
    'bucketsRoutes' => [
        'homepage' => 'page',
        'settings' => 'page'
    ]
];
