<?php

namespace Jaio\UI;

/**
 * 
 */
class Assetjoomla extends Asset{ 

    protected static $version = 0;
    protected static $components = [];

    protected static function addAsset($type, $links, $id = null , $parent = null){
        $links = (array)$links;
        if( empty($id) ) $id = md5(json_encode($links));

        if(isset(static::$assets[$type][$id])){
            static::$assets[$type][$id] = array_unique( array_merge(static::$assets[$type][$id], $links));
            
        }else{
            static::$assets[$type][$id] = $links;
        }
    }

    public static function find($where, $name, $isMin = false){
        
        $asset = static::$components[$where][$name];
        $parents = [];

        if( is_array($asset) && count($asset) == 2){
            // TODO support check existing of min
            list($parents, $links) = $asset;
            $links = (array) $links;

        } else {
            $links = (array) $asset;
        }

        foreach( $links as &$link){

            if($isMin)
            {
                $pos = strrpos($link, '.'.$where );
                if($pos !== false){
                    $link = substr_replace($link, '.min.'.$where, $pos, strlen($link));
                }
            }
            $link = static::$assetLink. '/'.$where .'/' . $link ;
        }

        return [$links, $parents];
    }

    public static function findJs($name, $isMin = false){

        return static::find( 'js', $name, $isMin);
    }

    public static function findCss($name, $isMin = false){

        return static::find( 'css', $name, $isMin);
    }

    public static function useJs($name, $isMin = false){

        if( is_array($name) ){

            foreach($name as $id){
                static::useJs($id, $isMin);
            }

        }else if( isset(static::$components['js'][$name])){

            list($links, $parents) = static::findJs($name, $isMin);

            if( count($parents)){
                foreach( $parents as $parent){
                    static::useJs($parent);
                }
            }

            foreach( $links as $link){
                static::addJs( $link, $name);
            }
        }
    }

    public static function useCss($name, $isMin = false){
        
        if( is_array($name) ){

            foreach($name as $id){
                static::useCss($id, $isMin);
            }

        }else if( isset(static::$components['css'][$name])){
            $asset = static::$components['css'][$name];
            $parents = [];
            if( is_array($asset) && count($asset) == 2){
                // TODO support check existing of min
                list($parents, $links) = $asset;
                $links = (array) $links;

            } else {
                $links = (array) $asset;
            }

            if( count($parents)){
                foreach( $parents as $parent){
                    static::useCss($parent);
                }
            }

            foreach( $links as $link){
                static::addCss( $link, $name);
            }
        }
    }

    public static function generateStyleSheet(){
        if( count(static::$cssInline) ){
            JFactory::getDocument()->addStyleDeclaration(
                implode( "\n", static::$cssInline)
            );
        }
    }

    /**
     * Jooma still doesn't support footer Js generate, gen let just echo as parent
     *
    public static function generateJavascript(){
        if( count(static::$jsInline) ){
            JFactory::getDocument()->addScriptDeclaration(
                implode( "\n", static::$jsInline)
            );
        }
    }
    */

    public static function generateAssetLinks(){ 
        static::$cssLinks = [];
        static::$jsLinks = [];
        static::processAssets([
            'js' => function($link ){
                JFactory::getDocument()->addScript( $link );
            },
            'css' => function($link ){
                JFactory::getDocument()->addStylesheet( $link );
            }
        ]);
    }

}