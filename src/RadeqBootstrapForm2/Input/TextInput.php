<?php

namespace RadeqBootstrapForm2\Input;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016-2020
 * @license MIT
 */

/**
 * Text type (support HTML5 base types - @see $supportedTypes)
 */
class TextInput extends AbstractInput
{
    /** @var array support for HTML5 */
    private $supportedTypes = [
        'text',
        'password',
        'file',
        'color',
        'date',
        'datetime',
        'datetime-local',
        'email',
        'month',
        'number',
        'range',
        'search',
        'tel',
        'time',
        'url',
        'week'
    ];

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return (in_array($this->getAttribute('type'), $this->supportedTypes)) ? $this->getAttribute('type') : 'text';
    }

    /**
     * {@inheritdoc}
     */
    public function show(): string
    {
        return '     <label for="' . $this->getName() . '">' . $this->getLabel() . ':</label>' . PHP_EOL .
            '     <input id="' . $this->getName() . '" name="' . $this->getName() . '" value="' . $this->getValue()
            . '" type="' . $this->getType() . '" ' . $this->getAttributes() . ' class="form-control"/>' . PHP_EOL;
    }
}
