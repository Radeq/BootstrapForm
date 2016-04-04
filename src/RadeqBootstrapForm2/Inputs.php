<?php
namespace RadeqBootstrapForm2;
/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */

use RadeqBootstrapForm2\Model\IteratorAbstract;
use RadeqBootstrapForm2\Input\AbstractInput;
use RadeqBootstrapForm2\Model\FormException;
use RadeqBootstrapForm2\Model\IteratorItemInterface;

/**
 * Kolekcja Input (Iterator)
 */
class Inputs extends IteratorAbstract {
    public function add(IteratorItemInterface $ai) {
        if (!$ai instanceof AbstractInput) {
            throw new FormException('Items->add musi być obiektem pochodnym AbstractInput');
        }
        $this->items[] = $ai;
    }
}
