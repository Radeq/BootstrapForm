<?php

namespace RadeqBootstrapForm2\Model;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016-2020
 * @license MIT
 */

/**
 *  Iterator interface
 */
interface IteratorInterface
{
    /**
     * @param IteratorItemInterface $ai
     * @throws FormException
     */
    public function add(IteratorItemInterface $ai);
}
