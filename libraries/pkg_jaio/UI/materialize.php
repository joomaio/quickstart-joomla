<?php

namespace Jaio\UI;

/**
 * 
 */
class materialize extends Assetjoomla{
    protected static $version = 'v1.0.0';
    protected static $assetLink = 'media/pkg_jaio/materialize';
    protected static $components = [
        'css' => [
            'materialize' => 'materialize.css',
        ],
        'js' => [
            'jquery' => 'jquery-2.1.1.js',
            'materialize' => [
                ['jquery'],
                'materialize.js'
            ],
            'init' => [
                ['materialize'],
                'init.js'
            ]
        ]
    ]; 
}