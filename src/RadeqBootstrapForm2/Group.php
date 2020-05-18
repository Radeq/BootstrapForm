<?php

namespace RadeqBootstrapForm2;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016-2020
 * @license MIT
 */

use RadeqBootstrapForm2\Model\IteratorItemInterface;
use RadeqBootstrapForm2\Input\AbstractInput;

/**
 * Form group
 * Collection of Inputs (Iterator)
 */
class Group implements IteratorItemInterface
{
    /** @var Inputs */
    private $inputs;
    /** @var string */
    private $title, $description;

    /**
     * Group constructor.
     * @param string $title
     * @param string|null $description
     */
    public function __construct(string $title, ?string $description = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->inputs = new Inputs();
    }

    /**
     * Set group title
     * @param string $title
     * @return self
     */
    public function setTitle($title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get group title
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set group description
     * @param string|null $description
     * @return self
     */
    public function setDescription($description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add group input
     * @param AbstractInput $ai
     * @return self
     * @throws Model\FormException
     */
    public function addInput(AbstractInput $ai): self
    {
        $this->inputs->add($ai);
        return $this;
    }

    /**
     * Get all input fields
     * @return Inputs
     */
    public function getInputs(): Inputs
    {
        return $this->inputs;
    }
}
