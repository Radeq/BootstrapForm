<?php
namespace RadeqBootstrapForm2\Model;
/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */


/**
 *  Interfejs iteratora
 */
interface IteratorInterface {
    /**
     * @throws FormException
     * @param IteratorItemInterface $ai
     */
    public function add(IteratorItemInterface $ai);
}
