<?php

namespace RadeqBootstrapForm2\Model;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */

/**
 * Trait pomagający z atrybutami.
 * Trochę przerost formy nad treścią ;)
 */
trait AttributeTrait {
    /** @var array */
    protected $attributes = [];
    
    /**
     * Dodaje opcję
     * @param string $name nazwa
     * @param string $value wartość
     * @return self
     */
    public function setAttribute($name, $value) {
        $this->attributes[$name] = $value;
        return $this;
    }
    
    /**
     * Zwraca wartość wybranego atrybutu
     * @param string $name nazwa
     * @return string null jeśli nie istnieje
     */
    public function getAttribute($name) {
        return (isset($this->attributes[$name])) ? $this->attributes[$name] : null;
    }

    /**
     * Zwraca atrybuty w formie zserializowanej do atrybutów formularza/inputa
     * @return string
     */
    protected function getAttributes() {
        $r = '';
        foreach ($this->attributes as $k => $v) {
            $r.=' ' . $k . '="' . $v . '"';
        }
        return $r;
    }

}
