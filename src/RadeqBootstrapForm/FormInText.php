<?php

namespace RadeqBootstrapForm;

/**
 * Pole typu input
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2014
 * @license MIT
 */
class FormInText extends FormIn {

    private $type = 'text';

    public function set_type($type) {
        $this->type = $type;
    }

    public function show() {
        return '     <label for="' . $this->name . '">' . $this->label . ':</label>' . PHP_EOL .
                '     <input type="' . $this->type . '"' . $this->get_input_in() . ' class="form-control"/>' . PHP_EOL;
    }

}

?>
