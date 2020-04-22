<?php

namespace Jaio\UI;

/**
 * Class to enqueue the script, stylesheet follow a dependencies
 *  
 */

abstract class Asset{

    protected static $assets = [];
    protected static $jsLinks;
    protected static $jsInline = [];
    protected static $cssLinks;
    protected static $cssInline = [];
    protected static $assetLink;

    public static function addAssetLink($url){
        static::$assetLink = trim($url, '/'). '/';
    }

    protected static function addAsset($type, $links, $id = null ){
        $links = (array)$links;
        if( empty($id) ) $id = md5(json_encode($links));

        if(isset(static::$assets[$type][$id])){
            static::$assets[$type][$id] = array_merge(static::$assets[$type][$id], $links);
        }else{
            static::$assets[$type][$id] = $links;
        }
    }

    public static function addCss($links, $id){
        static::addAsset('css', $links, $id);
    }

    public static function addJs($links, $id){
        static::addAsset('js', $links, $id);
    }

    public static function processAssets($callback){
        foreach(static::$assets as $type=>$assets){
            foreach($assets as $arr){
                foreach($arr as $link){
                    if(isset($callback[$type])){
                        $callback[$type]( $link );
                    }
                }
            }
        }   
    }

    public static function addJsInline($str){
        static::$jsInline[] = $str;
    }

    public static function addCssInline($str){
        static::$cssInline[] = $str;
    }

    public static function generateStyleSheet(){
        if( count(static::$cssInline) ){
            array_unshift(static::$cssInline, '<style>');
            array_push(static::$cssInline, '</style>');
            echo implode( "\n", static::$cssInline);
        }
    }

    public static function generateJavascript(){
        if( count(static::$jsInline) ){
            array_unshift(static::$jsInline, '<script>');
            array_push(static::$jsInline, '</script>');
            echo implode( "\n", static::$jsInline);
        }
    }

    public static function generateAssetLinks(){
        static::$cssLinks = [];
        static::$jsLinks = [];
        static::processAssets([
            'css' => function($link ){
                static::$cssLinks[] = '<link rel="stylesheet" type="text/css" href="'. $link .'" >';
            }, 
            'js' => function($link ){
                static::$jsLinks[] = '<script src="' . $link. '"></script>';
            }
        ]);
    }

    public static function generateCssLinks(){

        if( is_null( static::$cssLinks ) ){
            static::generateAssetLinks();
        }

        echo implode( "\n", static::$cssLinks);
    }

    public static function generateJsLinks(){

        if( is_null( static::$jsLinks ) ){
            static::generateAssetLinks();
        }

        echo implode( "\n", static::$jsLinks);
    }
}