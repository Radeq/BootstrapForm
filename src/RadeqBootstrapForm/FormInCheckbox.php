<?php

namespace RadeqBootstrapForm;

/**
 * Pole typu checkbox
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2014 
 * @license MIT
 */
class FormInCheckbox extends FormIn {

    private $check;

    public function __construct($label, $name) {
        if (substr($name, -2) !== '[]')
            $name.='[]'; //w checkbox name powinien mieć postac nazwa[] aby przesylac wszystkie zaznaczone elementy
        parent::__construct($label, $name);
    }

    /**
     * Określ możliwe wartości pola
     * @param array $value array('nazwa'=>'opis')
     * @return FormInRadio
     * @throws Exception
     */
    public function set_value($value) {
        if (!is_array($value))
            throw new Exception('Value must be array');
        $this->value = $value;
        return $this;
    }

    /**
     * Zaznacza element o wybranej nazwie
     * @param array $name klucz(e) z $value
     * @return FormInRadio
     */
    public function check(array $name) {
        $this->check = $name;
        return $this;
    }

    public function show() {
        $r = '     <div class="radio">' . PHP_EOL .
                '      <label><strong>' . $this->label . '</strong>: </label>' . PHP_EOL;
        foreach ($this->value as $k => $v) {
            $r.='      <label><input type="checkbox" name="' . $this->name . '" id="' . str_replace('[]', '', $this->name) . '_' . $k . '" value="' . $k . '" ' . ((in_array($k, $this->check)) ? 'checked' : '') . '> ' . $v . '</label>' . PHP_EOL;
        }
        $r.='     </div>' . PHP_EOL;
        return $r;
    }

}

?>
