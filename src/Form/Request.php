<?php
namespace Lave\Form;

class Request {
    const TYPE_POST = 'POST';
    const TYPE_GET = 'GET';

    public function typePost() {
        return static::TYPE_POST;
    }

    public function typeGet() {
        return static::TYPE_GET;
    }

    public function get($name, $method=self::TYPE_GET) {
        if ($method == static::TYPE_POST) {
            if (isset($_POST[$name])) {
                return $_POST[$name];
            }
            return null;
        }

        if ($method == static::TYPE_GET) {
            if (isset($_GET[$name])) {
                return $_GET[$name];
            }
            return null;
        }

        return null;
    }


}