<?php
namespace Lave\Form;

use Lave\Form\Interfaces\IApp;
use Lave\Form\Traits\TApp;

class Builder implements
    IApp
{
    use TApp;
    
    /**
     * @var Control
     */
    protected $control;

    /**
     * @var Form
     */
    protected $form;
    
    /**
     * @return Control
     */
    public function control() {
        if (!is_null($this->control)) {
            return $this->control;
        }

        $this->setControl(new Control());
        return $this->control();
    }

    public function setControl(Control $control) {
        $this->control = $control;
        $this->control->setApp($this->getApp());
        return $this;
    }

    /**
     * @return Form
     */
    public function form() {
        if (!is_null($this->form)) {
            return $this->form;
        }

        $this->setForm(new Form());
        return $this->form();
    }

    public function setForm(Form $form) {
        $this->form = $form;
        $this->form->setApp($this->getApp());
        return $this;
    }


}
