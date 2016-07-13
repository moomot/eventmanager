<?php

/**
 * Created by PhpStorm.
 * User: kiko
 * Date: 26.05.16
 * Time: 17:47
 */
class Controller_Index extends Controller
{
    function action_index()
    {
        if($this->isLogged()) {
            $this->view->generate("profile.php");
        } else {
            if (isset($_POST['login']) && isset($_POST['password'])) {
                // check login and password (login)
                if(!empty($_POST['login']) && !empty($_POST['password']) && !isset($_POST['email'])) {
                    $login = $_POST['login'];
                    $password = $_POST['password'];


                    // get password by login from DB
                    $data = $this->model->getPass($login);

                    if(password_verify($password, $data['password'])) {
                        // success
                        Session::set("valid", true);
                        Session::set("timeout", time());
                        Session::set("username", $login);
                        $this->view->generate("profile.php");
                    } else {
                        // denied
                        Session::destroy();
                        unset($_SESSION['username']);
                        unset($_SESSION['timeout']);
                        unset($_SESSION['valid']);
                        $err['in'] = "Incorrect username or password. Try again!";
                        $this->view->generateMinTpl("login.php", $err);
                    }
                }
                // reg
                else {
                    if( !empty($_POST['email'] )) {
                        $data['login'] = Security::SanitizeForSQL($_POST['login']);
                        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $data['email'] = Security::SanitizeForSQL($_POST['email']);
                        if ( $this->model->isUserAvailable($data) ) {
                            if ($this->model->registerUser($data)) {
                                $this->view->generateMinTpl("alerts/success.php", "Registration completed successfully! <a href=\"/\">Sign in</a>");
                            } else {
                                $this->redirect_to_main("/#signup");
                            }
                        } else {
                            $err['reg'] = "User with the same login or email is exists!";
                            $this->view->generateMinTpl("login.php", $err);
                        }

                    }
                }
            } else {
                $this->view->generateMinTpl("login.php");
            }
        }
    }

    private function isLogged() {
        if( isset($_SESSION['username']) && isset($_SESSION['valid']) && isset($_SESSION['timeout'])  ) {
            if ( Session::get("valid") ) {
                if( $_SESSION['timeout'] + 60 * 60 > time() ) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}