<?php

namespace RadeqBootstrapForm2\Input;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016-2020
 * @license MIT
 */

use RadeqBootstrapForm2\Model\InputInterface;
use RadeqBootstrapForm2\Model\IteratorItemInterface;
use RadeqBootstrapForm2\Model\AttributeTrait;

/**
 * Abstract input class
 */
abstract class AbstractInput implements InputInterface, IteratorItemInterface
{
    use AttributeTrait;

    /** @var string */
    protected $label;
    /** @var string */
    protected $name;
    /** @var mixed */
    protected $value;

    /**
     * @param string $label
     * @param string $name
     * @param mixed $value
     * @param array $attributes
     * @return $this
     */
    public function __construct(string $label, string $name, $value = null, array $attributes = [])
    {
        $this->setLabel($label);
        $this->setName($name);
        $this->setValue($value);
        $this->setAttributesBanned(['id', 'name', 'value']);
        $this->setAttributes($attributes);
        return $this;
    }

    /**
     * Set input label
     * @param string $label
     * @return self
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Get input label
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set input name
     * @param string $name
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get input name
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set input value
     * @param mixed $value
     * @return self
     */
    public function setValue($value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get input value
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
