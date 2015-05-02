<?php
namespace Lave\Form;

use Lave\Form\Traits\TBuilder;
use Lave\Form\Traits\TRequest;
use Lave\Form\Traits\TSingleton;
use Lave\Form\Traits\TValidator;

class App {

    use TSingleton,
        TBuilder,
        TValidator,
        TRequest;

}
