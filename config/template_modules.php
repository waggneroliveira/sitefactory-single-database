<?php

/*
|--------------------------------------------------------------------------
| Template Modules
|--------------------------------------------------------------------------
|
| Estrutura:
|
| template
| ├── onepage
| │   └── home
| │
| ├── multipage
| │   ├── home
| │   ├── about
| │   ├── products
| │   ├── blog
| │   └── contact
| │
| ├── smtp
| ├── security_and_access_control
| └── limits
|
*/

return [

    /*
    |--------------------------------------------------------------------------
    | PETSHOP
    |--------------------------------------------------------------------------
    */

    'petshop' => [
        'onepage' => [

            'home' => [
                'slides',
                'topics',
                'statute',
                'letsgo',
                'faq_session',
                'faq',
                'testimonials',
                'services',

                'about',
                'benefits',
                'mission',
                'representatives',
                'videos',
                'service_locations',

                'brands',
                'product_categories',
                'products',

                'blog_categories',
                'blog',

                'contact',
                'contact_leads',
                'download_leads',
            ],

        ],

        'multipage' => [

            'home' => [
                'slides',
                'topics',
                'statute',
                'letsgo',
                'faq_session',
                'faq',
                'testimonials',
                'services',
            ],

            'about' => [
                'about',
                'benefits',
                'mission',
                'representatives',
                'videos',
                'service_locations',
            ],

            'products' => [
                'brands',
                'product_categories',
                'products',
            ],

            'blog' => [
                'blog_categories',
                'blog',
            ],

            'contact' => [
                'contact',
                'contact_leads',
                'download_leads',
            ],

        ],

        'smtp' => [
            'config_smtp',
        ],

        'security_and_access_control' => [
            'audit',
            'permissions',
            'users',
        ],

        'config_theme' => [
            'config_theme',
        ],

        'limits' => [
            'slides' => 3,
            'topics' => 6,
            'testimonials' => 6,
            'faq' => 10,
            'services' => 6,
        ],

    ],

    'cartorio' => [

        'onepage' => [

            'home' => [
                'slides',
                'topics',
                'services',
                'gallery',

                'about',

                'contact',
                'contact_leads',
            ],

        ],

        'multipage' => [

            'home' => [
                'slides',
                'topics',
                'services',
                'gallery',
            ],

            'about' => [
                'about',
            ],

            'contact' => [
                'contact',
                'contact_leads',
            ],

        ],

        'smtp' => [
            'config_smtp',
        ],

        'security_and_access_control' => [
            'audit',
            'permissions',
            'users',
        ],

        'config_theme' => [
            'config_theme',
        ],

        'limits' => [
            'slides' => 1,
            'topics' => 3,
            'services' => 6,
            'gallery' => 3,
        ],

    ],

    'transporte' => [

        'onepage' => [

            'home' => [
                'slides',
                'faq_session',
                'faq',
                'testimonials',
                'services',

                'about',

                'contact',
            ],

        ],

        'multipage' => [

            'home' => [
                'slides',
                'faq_session',
                'faq',
                'testimonials',
                'services',
            ],

            'about' => [
                'about',
            ],

            'contact' => [
                'contact',
            ],

        ],

        'smtp' => [
            'config_smtp',
        ],

        'security_and_access_control' => [
            'audit',
            'permissions',
            'users',
        ],

        'config_theme' => [
            'config_theme',
        ],

        'limits' => [
            'slides' => 3,
            'testimonials' => 6,
            'faq' => 10,
            'services' => 6,
        ],

    ],

    'whi-web' => [

        'onepage' => [

            'home' => [
                'slides',
                'topics',
                'services',
                'gallery',
                'videos',
                'about',

                'contact',
                'contact_leads',
            ],

        ],

        'multipage' => [

            'home' => [
                'slides',
                'topics',
                'services',
                'gallery',
            ],

            'about' => [
                'about',
            ],

            'contact' => [
                'contact',
                'contact_leads',
            ],

        ],

        'smtp' => [
            'config_smtp',
        ],

        'security_and_access_control' => [
            'audit',
            'permissions',
            'users',
        ],

        'config_theme' => [
            'config_theme',
        ],

        'limits' => [
            'slides' => 1,
            'topics' => 4,
            'services' => 6,
            'gallery' => 3,
        ],

    ],

];