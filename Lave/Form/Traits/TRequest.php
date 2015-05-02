<?php
namespace Lave\Form\Traits;

use Lave\Form\Request;

trait TRequest {

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
    public function getRequest() {
        if (!is_null($this->request)) {
            return $this->request;
        }

        $this->setRequest(new Request());
        return $this->getRequest();
    }

}