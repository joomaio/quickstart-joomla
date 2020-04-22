<?php

namespace Jaio\UI;

/**
 * 
 */
class w3css extends Assetjoomla{
    protected static $version = 'v4.12';
    protected static $assetLink = 'media/pkg_jaio/w3css';
    protected static $components = [
        'css' => [
            'w3' => 'w3.css',
            'w3-theme-teal' => 'w3-theme-teal.css',
            'font-awesome' => 'font-awesome.css',
        ],
        'js' => [
            'app' => 'app.js',
        ]
    ]; 
}