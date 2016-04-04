<?php

namespace RadeqBootstrapForm2\Input;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */

/**
 * Pole wprowadzania danych w formularzu (checkbox)
 */
class CheckboxInput extends AbstractInput {

    /**
     * 
     * @param string $label
     * @param string $name
     * @param array $value
     * @param array $attributes ['data'] - odpowiada za wyświetlane pola
     * @return $this
     */
    public function __construct($label, $name, $value = null, $attributes = array()) {
        if (substr($name, -2) !== '[]')
            $name.='[]'; //w checkbox name powinien mieć postac nazwa[] aby przesylac wszystkie zaznaczone elementy
        parent::__construct($label, $name, $value, $attributes);
    }

    /**
     * {@inheritdoc}
     */
    public function getType() {
        return 'checkbox';
    }

    /**
     * {@inheritdoc}
     */
    public function show() {
        $r = '     <div class="radio">' . PHP_EOL .
                '      <label><strong>' . $this->getLabel() . '</strong>: </label>' . PHP_EOL;
        foreach ($this->attributes['data'] as $k => $v) {
            $r.='      <label><input id="'.str_replace('[]', '', $this->getName()).'_'.$k.'" name="'.$this->getName().'"  value="' . $k . '" type="'.$this->getType().'"'. ((in_array($k, $this->getValue())) ? ' checked' : '') . '/> ' . $v . '</label>' . PHP_EOL;
        }
        $r.='     </div>' . PHP_EOL;
        return $r;
    }

}
