<?php
namespace Lave\Form\Traits;

trait TSingleton {
    protected static $instance;
    final public static function i() {
        return isset(static::$instance)
            ? static::$instance
            : static::$instance = new static;
    }

    final private function __construct() {
        $this->init();
    }

    protected function init() {
    }

    final private function __clone() {
    }
}