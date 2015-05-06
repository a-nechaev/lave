<?php
namespace Lave\Form\Traits;

use Lave\Form\Request;

trait RequestTrait {

    /** @var Request */
    protected $request;

    /**
     * @param Request $request
     * @return $this
     */
    public function setRequest(Request $request) {
        $this->request = $request;
        return $this;
    }

    /**
     * @return Request
     */
    public function request() {
        if (!is_null($this->request)) {
            return $this->request;
        }

        $this->setRequest(new Request());
        return $this->request();
    }

}