<?php
namespace Lave\Form\Interfaces;

use Lave\Form\Builder;

interface IBuilder {

   /**
    * @param Builder $builder
    * @return $this
    */
   public function setBuilder(Builder $builder);

   /**
    * @return Builder
    */
   public function getBuilder();


}