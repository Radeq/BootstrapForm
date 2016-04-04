<?php

namespace RadeqBootstrapForm2\Input;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */

/**
 * Pole wprowadzania danych w formularzu (@see $supportedTypes)
 */
class TextInput extends AbstractInput {
    /** @var array wsparcie dla input HTML5 */
    private $supportedTypes = ['text', 'password', 'file', 'color', 'date', 'datetime', 'datetime-local', 'email', 'month', 'number', 'range', 'search', 'tel', 'time', 'url', 'week'];
    
    /**
     * {@inheritdoc}
     */
    public function getType() {
        return (isset($this->attributes['type']) && in_array($this->attributes['type'], $this->supportedTypes)) ? $this->attributes['type'] : 'text';
    }
    
    /**
     * {@inheritdoc}
     */
    public function show() {
        return '     <label for="' . $this->getName() . '">' . $this->getLabel() . ':</label>' . PHP_EOL .
                '     <input id="'.$this->getName().'" name="'.$this->getName().'" value="'. $this->getValue() .'" type="' . $this->getType() . '"' . $this->getAttributes() . ' class="form-control"/>' . PHP_EOL;
    }

}
