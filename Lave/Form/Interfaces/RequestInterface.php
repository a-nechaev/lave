<?php
namespace Lave\Form\Interfaces;

use Lave\Form\Request;

interface RequestInterface {

   /**
    * @param Request $request
    * @return $this
    */
   public function setRequest(Request $request);

   /**
    * @return Request
    */
   public function getRequest();


}