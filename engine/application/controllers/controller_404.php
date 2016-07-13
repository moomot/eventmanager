<?php
/**
 * Created by PhpStorm.
 * User: kiko
 * Date: 26.05.16
 * Time: 22:39
 */
class Controller_404 extends Controller {
    function action_index()
    {
        // headers of 404 not found must be here
        echo "Page not found";
    }

}