<?php

namespace RadeqBootstrapForm;

/**
 * Abstrakcyjna klasa do obsługi pól formularza
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2014 
 * @license MIT
 */
abstract class FormIn {

    protected $label, $name, $value, $placeholder;

    /**
     * Wyświetla input
     */
    abstract function show();

    public function __construct($label, $name) {
        $this->label = $label;
        $this->name = $name;
        return $this;
    }

    /**
     * Określ wartość pola
     * @param string $value wartość
     * @return FormIn
     */
    public function set_value($value) {
        $this->value = $value;
        return $this;
    }

    /**
     * Określ tekst zastępczy (jeśli pole jest puste)
     * @param string $placeholder wartość
     * @return FormIn
     */
    public function set_placeholder($placeholder) {
        $this->placeholder = $placeholder;
        return $this;
    }

    /**
     * Domyślne parametry dla input (id,name,value,placeholder)
     * @return string
     */
    protected function get_input_in() {
        return 'id="' . $this->name . '" name="' . $this->name . '" value="' . $this->value . '" placeholder="' . $this->placeholder . '"';
    }

}

?>
