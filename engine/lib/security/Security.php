<?php

/**
 * Created by PhpStorm.
 * User: kiko
 * Date: 29.05.16
 * Time: 10:55
 */
class Security
{

    /**
     * Security constructor.
     */
    private function __construct() { }

    static function SanitizeForSQL($str)
    {
        if( function_exists( "mysql_real_escape_string" ) )
        {
            $ret_str = mysql_real_escape_string( $str );
        }
        else
        {
            $ret_str = addslashes( $str );
        }
        return $ret_str;
    }

    /*
       Sanitize() function removes any potential threat from the
       data submitted. Prevents email injections or any other hacker attempts.
       if $remove_nl is true, newline chracters are removed from the input.
       */
    static function Sanitize($str,$remove_nl=true)
    {
        $str = self::StripSlashes($str);
        if($remove_nl)
        {
            $injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
            );
            $str = preg_replace($injections,'',$str);
        }
        return $str;
    }
    static function StripSlashes($str)
    {
        if(get_magic_quotes_gpc())
        {
            $str = stripslashes($str);
        }
        return $str;
    }
}