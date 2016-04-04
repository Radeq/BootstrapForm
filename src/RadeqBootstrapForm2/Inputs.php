<?php
namespace RadeqBootstrapForm2;
/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */

use RadeqBootstrapForm2\Model\IteratorAbstract;
use RadeqBootstrapForm2\Model\IteratorItemInterface;

/**
 * Kolekcja Input (Iterator)
 */
class Inputs extends IteratorAbstract {
    public function add(IteratorItemInterface $ai) {
        $this->items[] = $ai;
    }
}
