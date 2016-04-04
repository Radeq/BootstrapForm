<?php
namespace RadeqBootstrapForm2\Model;
/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */

use Iterator as BaseIterator;

/**
 * Iterator pozwalający na przejście foreach przez zbiór obiektów
 */
abstract class IteratorAbstract implements BaseIterator, IteratorInterface {
    /** @var array */
    protected $items = [];
    private $index = 0;

    public function current()
    {
        return $this->items[$this->index];
    }

    public function next()
    {
        $this->index ++;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return isset($this->items[$this->key()]);
    }

    public function rewind()
    {
        $this->index = 0;
    }
}
