<?php
namespace RadeqBootstrapForm2;
/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */

use RadeqBootstrapForm2\Model\IteratorAbstract;

/**
 * Grupy pól dla formularza
 * Kolekcja Groups (Iterator)
 */
class Groups extends IteratorAbstract
{
    public function add(Group $ai) {
        $this->items[] = $ai;
    }
}

