<?php

namespace App;


class Session
{
    public static function init()
    {
        session_start();
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function setInfo($type, $msg)
    {
        $_SESSION['info'] = [];
        array_push($_SESSION['info'], ['type' => $type, 'msg' => $msg]);
    }


    public static function getInfo()
    {
        if (isset($_SESSION['info'])) {
            return $_SESSION['info'][0];
        } else {
            return false;
        }
    }


    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function generateToken()
    {
        $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    }

    public static function getToken(){
        return $_SESSION['token'];
    }
}
