<?php

/**
 * Created by PhpStorm.
 * User: kiko
 * Date: 29.05.16
 * Time: 9:39
 */
class Application
{
    public $_config = "";
    private $_db_h;
    private static $_instance; //The single instance


    /**
     * @return Application instance
     */
    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $this->_config = self::getConfig();
        try {
            $db = Database::getInstance();
            $this->_db_h = $db->getConnection();
            $this->_db_h->exec('SET NAMES utf8');

        } catch (Exception $e) {
            echo "Exception view not found";
        }
    }

    // Magic method clone is empty to prevent duplication of connection
    private function __clone()
    {
    }

    /**
     * Get config object
     * @return Config
     */
    public static function getConfig() {
        return new Config();
    }

    /**
     * Get PDO
     * @return PDO
     */
    public function getDBH() {
        return $this->_db_h;
    }
}