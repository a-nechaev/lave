<?php
namespace Lave\Form\Interfaces;

use Lave\Form\App;

interface AppInterface {

   /**
    * @param App $app
    * @return $this
    */
   public function setApp(App $app);

   /**
    * @return App
    */
   public function getApp();


}