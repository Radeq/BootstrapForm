<?php

namespace RadeqBootstrapForm2\Input;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */

/**
 * Pole wprowadzania danych w formularzu (radio)
 */
class RadioInput extends AbstractInput {

    /**
     * 
     * @param string $label
     * @param string $name
     * @param string $value
     * @param array $attributes ['data'] - odpowiada za wyświetlane pola
     * @return $this
     */
    public function getType() {
        return 'radio';
    }

    /**
     * {@inheritdoc}
     */
    public function show() {
        $r = '     <div class="radio">' . PHP_EOL .
                '      <label><strong>' . $this->getLabel() . '</strong>: </label>' . PHP_EOL;
        foreach ($this->getAttribute('data') as $k => $v) {
            $r.='      <label><input id="'.str_replace('[]', '', $this->getName()).'_'.$k.'" name="'.$this->getName().'"  value="' . $k . '" type="'.$this->getType().'"'. (($v === $this->getValue()) ? ' checked' : '') . '/> ' . $v . '</label>' . PHP_EOL;
        }
        $r.='     </div>' . PHP_EOL;
        return $r;
    }

}
