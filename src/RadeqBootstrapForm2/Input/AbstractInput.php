<?php

namespace RadeqBootstrapForm2\Input;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */

use RadeqBootstrapForm2\Model\InputInterface;
use RadeqBootstrapForm2\Model\IteratorItemInterface;
use RadeqBootstrapForm2\Model\AttributeTrait;

/**
 * Abstrakcyjne pole wprowadzania danych w formularzu (input)
 */
abstract class AbstractInput implements InputInterface, IteratorItemInterface {
    use AttributeTrait;

    /** @var string */
    protected $label, $name, $value;

    /**
     * 
     * @param string $label
     * @param string $name
     * @param string $value
     * @param array $attributes
     * @return $this
     */
    public function __construct($label, $name, $value = null, $attributes = []) {
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Nazwa wyświetlana pola
     * @param string $label
     */
    public function setLabel($label) {
        $this->label = $label;
    }
    
    /**
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * Nazwa ukryta pola
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Wartość pola
     * @param string $value
     */
    public function setValue($value) {
        $this->value = $value;
    }
    
    /**
     * @return string
     */
    public function getValue() {
        return $this->value;
    }
}
