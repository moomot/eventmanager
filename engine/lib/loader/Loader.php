<?php
class Loader
{
    public static function libLoader($class)
    {
        $file_name = PATH_SITE.'/engine/lib/'.strtolower($class).'/'.$class.'.php';
        if(file_exists($file_name))
            include_once $file_name;
    }

    public static function coreLoader($class) {
        $file_name = PATH_SITE.'/engine/application/core/'.$class.'.php';
        if(file_exists($file_name))
            include_once $file_name;
    }

    public static function exceptionsLoader($class) {
        $file_name = PATH_SITE.'/engine/lib/exceptions/'.$class.'.php';
        if(file_exists($file_name))
            include_once $file_name;
    }
    public static function init()
    {
        spl_autoload_register(array('Loader','libLoader'));
        spl_autoload_register(array('Loader','coreLoader'));
        spl_autoload_register(array('Loader', 'exceptionsLoader'));
    }
}