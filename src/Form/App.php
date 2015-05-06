<?php
namespace Lave\Form;

use Lave\Form\Traits\BuilderTrait;
use Lave\Form\Traits\RequestTrait;
use Lave\Form\Traits\SingletonTrait;
use Lave\Form\Traits\ValidatorTrait;

class App {

    use SingletonTrait,
        BuilderTrait,
        ValidatorTrait,
        RequestTrait;

}
