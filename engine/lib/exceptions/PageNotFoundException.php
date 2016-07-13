<?php

/**
 * Created by PhpStorm.
 * User: kiko
 * Date: 26.05.16
 * Time: 22:33
 */
require_once("IException.php");

class PageNotFoundException extends Exception implements IException
{
    public function __construct($message = null, $code = 0) {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return get_class($this) . " '{$this->message}' in {$this->file}({$this->line})\n";
    }
}