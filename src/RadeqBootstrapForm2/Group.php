<?php

namespace RadeqBootstrapForm2;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */

use RadeqBootstrapForm2\Model\IteratorItemInterface;
use RadeqBootstrapForm2\Input\AbstractInput;

/**
 * Grupy pól dla formularza
 * Kolekcja Groups (Iterator)
 */
class Group implements IteratorItemInterface {

    /** @var Inputs */
    private $inputs;
    
    /** @var string */
    private $title, $description;
    
    public function __construct($title, $description = null) {
        $this->title = $title;
        $this->description = $description;
        $this->inputs = new Inputs();
    }

    
    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Dodaje pole
     * @param AbstractInput $ai
     * @return Form
     */
    public function addInput(AbstractInput $ai) {
        $this->inputs->add($ai);
        return $this;
    }
    
    /**
     * 
     * @return Input
     */
    public function getInputs() {
        return $this->inputs;
    }

}
