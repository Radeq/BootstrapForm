<?php

namespace RadeqBootstrapForm2;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016-2020
 * @license MIT
 */

use RadeqBootstrapForm2\Model\IteratorAbstract;
use RadeqBootstrapForm2\Model\IteratorItemInterface;
use RadeqBootstrapForm2\Model\FormException;

/**
 * Form groups
 * Collection Groups (Iterator)
 */
class Groups extends IteratorAbstract
{
    public function add(IteratorItemInterface $ai)
    {
        if (!$ai instanceof Group) {
            throw new FormException('Groups->add must be instaceof Group');
        }
        $this->items[] = $ai;
    }
}

