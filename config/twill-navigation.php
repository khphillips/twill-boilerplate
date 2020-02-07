<?php

return [
	'pages' => [
        'title' => 'Pages',
        'module' => true,
        'primary_navigation' => [
           'homepage_features' => [
               'title' => 'Featured on Home',
               'route' => 'admin.page.homepage',
            ],
        ],
    ],
    'settings' => [
    	'title' => 'Settings',
    	'route' => 'admin.settings',
    	'params' => [
    		'section' => 'site',
    	],
    	'primary_navigation' => [
            'site' => [
                'title' => 'Site Settings',
                'route' => 'admin.settings',
                'params' => ['section' => 'site']
            ],
            'meta' => [
                'title' => 'Meta Tags',
                'route' => 'admin.settings',
                'params' => ['section' => 'meta']
            ],
            'settings_features' => [
               'title' => 'Featured on Home',
               'route' => 'admin.page.settings',
            ],
        ]
    ],


];
