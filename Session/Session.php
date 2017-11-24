<?php
class Session {
    public static function is_user($login) {
        return (!empty($_SESSION['login']) && ($_SESSION['login'] == $login));
    }
    public static function is_admin() {
        if(!empty($_SESSION['admin']) && $_SESSION['admin']){
            return true;
        }else{
            return false;
        }
    }
}