<?php
/**
 * Created by PhpStorm.
 * User: kiko
 * Date: 26.05.16
 * Time: 15:42
 */
class Url
{
    public static $baseurl = '';

    public static function init() {
        self::$baseurl = implode('/', array_slice(explode('/', $_SERVER['PHP_SELF']), 0, -1));
    }

    public static function getBase()
    {
        return self::$baseurl;
    }

    public static function getRoutes()
    {
        $request_uri = str_replace(self::$baseurl, "", $_SERVER['REQUEST_URI']);
        return explode('/', $request_uri);
    }
}
