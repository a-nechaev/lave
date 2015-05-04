<?php
namespace Lave\Form\Traits;

use Lave\Form\App;

trait AppTrait {

    /** @var  App  */
    protected $app;

    /**
     * @return App
     */
    public function app() {
        if (!is_null($this->app)) {
            return $this->app;
        }

        $this->setApp(App::i());
        return $this->app();
    }

    /**
     * @param App $app
     * @return $this
     */
    public function setApp(App $app) {
        $this->app = $app;
        return $this;
    }
}