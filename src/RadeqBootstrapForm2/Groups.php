<?php
namespace RadeqBootstrapForm2;
/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */

use RadeqBootstrapForm2\Model\IteratorAbstract;
use RadeqBootstrapForm2\Model\IteratorItemInterface;
use RadeqBootstrapForm2\Model\FormException;

/**
 * Grupy pól dla formularza
 * Kolekcja Groups (Iterator)
 */
class Groups extends IteratorAbstract
{
    public function add(IteratorItemInterface $ai) {
        if (!$ai instanceof Group) {
            throw new FormException('Groups->add musi być obiektem klasy Group');
        }
        $this->items[] = $ai;
    }
}

