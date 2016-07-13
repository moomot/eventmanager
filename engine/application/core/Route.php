<?php

/**
 * Created by PhpStorm.
 * User: kiko
 * Date: 26.05.16
 * Time: 15:51
 */
class Route
{
    static function start() {
        // контроллер и действие по умолчанию
        $controller_name = 'Index';
        $action_name = 'index';

        $routes = Url::getRoutes();

        // get controller name
        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        // get action name
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        // get param
        if ( !empty($routes[3]) )
        {
            $param = $routes[3];
        }
//        if ( !empty($base) )
//            $param_cnt = -1;
//        else
//            $param_cnt = 0;
//
//        $param_cnt += sizeof($routes);
//
//        // если параметров больше чем нужно. что бы не было action/user/1/2/3/4/5/6/7/8
//        if( $param_cnt >= 4 )
//            Route::ErrorPage404();

        // добавляем префиксы
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

//        echo "Param: $param <br> ";
//        echo "Model: $model_name <br>";
//        echo "Controller: $controller_name <br>";
//        echo "Action: $action_name <br>";
        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "engine/application/controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "engine/application/controllers/".$controller_file;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
             */
            echo "fsd";
            //throw new PageNotFoundException("404 page not found");
        }
        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;
        $controller->getModel($model_name);
        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            if( !isset($param) )
            {
                $controller->$action();
            }
            else
            {
                $controller->$action($param);
            }
        }
        else
        {
            throw new Exception("404 page not found");
        }
    }

    static function ErrorPage404()
    {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.Url::$baseurl.'/404');
    }
}