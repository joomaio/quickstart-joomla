<?php

namespace Jaio\UI;

/**
 * 
 */
class bootstrap4 extends Assetjoomla{
    protected static $version = 'v4.1.1';
    protected static $assetLink = 'media/pkg_jaio/bootstrap4';
    protected static $components = [
        'css' => [
            'bootstrap' => 'bootstrap.css',
            'bootstrap-grid' => 'bootstrap-grid.css',
            'bootstrap-reboot' => 'bootstrap-reboot.css',
            'font-awesome' => 'font-awesome.css',
        ],
        'js' => [
            'jquery' => 'jquery/jquery.js',
            'bootstrap' => [
                ['jquery', 'popper'],
                'bootstrap/bootstrap.js'
            ],
            'chart' => [
                ['bootstrap'],
                'page/Chart.js'
            ],
            'offcanvas' => [
                ['bootstrap'],
                'page/offcanvas.js'
            ],
            'holder' => [
                ['jquery'],
                'vendor/holder.js'
            ],
            'popper' => [
                ['jquery'],
                'vendor/popper.js'
            ],
        ]
    ]; 
}