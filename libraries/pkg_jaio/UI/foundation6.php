<?php

namespace Jaio\UI;

/**
 * 
 */
class foundation6 extends Assetjoomla{
    protected static $version = 'v6';
    protected static $assetLink = 'media/pkg_jaio/foundation6';
    protected static $components = [
        'css' => [
            'foundation' => 'foundation.css',
            'motion-ui' => 'motion-ui.css',
            'foundation-prototype' => 'foundation-prototype.css',
            'foundation-icons' => 'foundation-icons.css',
        ],
        'js' => [
            'jquery' => 'jquery.js',
            'core' => [
                ['jquery'],
                'plugins/foundation.core.js'
            ],
            'util' => [
                ['jquery'],
                [
                    'plugins/foundation.util.box.js',
                    'plugins/foundation.util.imageLoader.js',
                    'plugins/foundation.util.keyboard.js',
                    'plugins/foundation.util.mediaQuery.js',
                    'plugins/foundation.util.motion.js',
                    'plugins/foundation.util.nest.js',
                    'plugins/foundation.util.timer.js',
                    'plugins/foundation.util.touch.js',
                    'plugins/foundation.util.triggers.js',
                ]
            ],
            'abide' => [
                ['util'],
                'plugins/foundation.abide.js',
            ],
            'accordion' => [
                ['core','util'],
                'plugins/foundation.accordion.js'
            ],
            'accordionMenu' => [
                ['core','util'],
                'plugins/foundation.accordionMenu.js',
            ],
            'drilldown' => [
                ['core','util'],
                'plugins/foundation.drilldown.js',
            ],
            'dropdown' => [
                ['core','util'],
                'plugins/foundation.dropdown.js',
            ],
            'dropdownMenu' => [
                ['core','util'],
                'plugins/foundation.dropdownMenu.js',
            ],
            'equalizer' => [
                ['core','util'],
                'plugins/foundation.equalizer.js',
            ],
            'interchange' => [
                ['core','util'],
                'plugins/foundation.interchange.js',
            ],
            'smoothScroll' => [
                ['core','util'],
                'plugins/foundation.smoothScroll.js',
            ],
            'magellan' => [
                ['core','util'],
                'plugins/foundation.magellan.js',
            ],
            'offcanvas' => [
                ['core','util'],
                'plugins/foundation.offcanvas.js',
            ],
            'orbit' => [
                ['core','util'],
                'plugins/foundation.orbit.js',
            ],
            'responsiveMenu' => [
                ['core','util'],
                'plugins/foundation.responsiveMenu.js',
            ],
            'responsiveToggle' => [
                ['core','util'],
                'plugins/foundation.responsiveToggle.js',
            ],
            'reveal' => [
                ['core','util'],
                'plugins/foundation.reveal.js',
            ],
            'slider' => [
                ['core','util'],
                'plugins/foundation.slider.js',
            ],
            'sticky' => [
                ['core','util'],
                'plugins/foundation.sticky.js',
            ],
            'tabs' => [
                ['core','util'],
                'plugins/foundation.tabs.js',
            ],
            'toggler' => [
                ['core','util'],
                'plugins/foundation.toggler.js',
            ],
            'tooltip' => [
                ['core','util'],
                'plugins/foundation.tooltip.js',
            ],
            'responsiveAccordionTabs' => [
                ['core','util'],
                'plugins/foundation.responsiveAccordionTabs.js'
            ],
        ]
    ]; 
}