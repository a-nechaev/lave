<?php
namespace Lave\Form\Interfaces;

use Lave\Form\Validator;

interface IValidator {

   /**
    * @param Validator $validator
    * @return $this
    */
   public function setValidator(Validator $validator);

   /**
    * @return Validator
    */
   public function validator();

   /**
    * @return bool
    */
   public function validate();

}