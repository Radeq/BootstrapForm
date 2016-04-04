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
     * Lista zastrzeżonych atrybutów
     * @var array 
     */
    protected $attributesBanned = [];

    /**
     * Dodaje opcję
     * @param string $name nazwa
     * @param string $value wartość
     * @throws FormException
     * @return self
     */
    public function setAttribute($name, $value) {
        if ($this->bannedAttribute($name) === true) {
            throw new FormException('Atrybut '.$name.' jest zarezerwowany');
        }
        $this->attributes[$name] = $value;
        return $this;
    }

    /**
     * Ustawia wszystkie atrybuty
     * @param array $attributes
     */
    public function setAttributes(array $attributes) {
        foreach ($attributes as $name => $value) {
            $this->setAttribute($name, $value);
        }
    }
    
    public function setAttributesBanned($attributesBanned) {
        $this->attributesBanned = $attributesBanned;
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

    /**
     * Sprawdza czy atrybut nie jest zastrzeżony
     * @param string $name
     * @return boolean
     */
    private function bannedAttribute($name) {
        return in_array($name, $this->attributesBanned);
    }

}
