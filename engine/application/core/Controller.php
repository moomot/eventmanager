<?php

/**
 * Created by PhpStorm.
 * User: kiko
 * Date: 26.05.16
 * Time: 15:52
 */
class Controller
{
    public $model = null;
    public $view = null;
    public $defaultPage = "/";

    function __construct()
    {
        $this->view = new View();
    }

    // default action
    function action_index()
    {
        header("Location: ".Url::$baseurl);
    }

    function getModel($model_name) {
        // include model
        $model_file = strtolower($model_name).'.php';
        $model_path = "engine/application/models/".$model_file;
        if(file_exists($model_path))
        {
            include "engine/application/models/".$model_file;
            $this->model = new $model_name;
        }
    }


    public function redirect_to_main($redirectPage = "/")
    {
        header('Location:'.Url::$baseurl.$redirectPage);
    }
}