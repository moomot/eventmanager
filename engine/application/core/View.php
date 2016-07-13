<?php

/**
 * Created by PhpStorm.
 * User: kiko
 * Date: 26.05.16
 * Time: 15:52
 */
class View
{

    /*
    $view - виды отображающие контент страниц;
    $data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
    */
    private $view;

    /**
     * View constructor.
     */

    public function __construct() { }

    function generateUserTpl($view, $data = null)
    {
        $this->view = $view;

        if (file_exists(USER_TPL_DIR."/".$view)) {
            // Include default index template
            include USER_TPL_DIR."/".$view;
        } else {
            throw new Exception("Шаблон не найден");
        }
    }

    function generateMinTpl($view, $data = null) {
        $this->view = $view;
        if (file_exists(USER_TPL_DIR."/minified_index.php")) {
            // Include default index template
            include USER_TPL_DIR."/minified_index.php";
        } else {
            throw new Exception("Шаблон не найден");
        }
    }

    function generate($view, $data = null) {
        $this->view = $view;
        if (file_exists(USER_TPL_DIR."/index.php")) {
            // Include default index template
            include USER_TPL_DIR."/index.php";
        } else {
            throw new Exception("Шаблон не найден");
        }
    }

    function getContent() {
        return $this->view;
    }
}