<?php
namespace Lave\Form\Traits;

use Lave\Form\Builder;

trait BuilderTrait {

    /** @var  Builder */
    protected $builder;

    /**
     * @param Builder $builder
     * @return $this
     */
    public function setBuilder(Builder $builder) {
        $this->builder = $builder;
        return $this;
    }

    /**
     * @return Builder
     */
    public function builder() {
        if (!is_null($this->builder)) {
            return $this->builder;
        }

        $this->setBuilder(new Builder());
        return $this->builder();
    }
}