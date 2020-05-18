<?php

namespace RadeqBootstrapForm2\Input;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016-2020
 * @license MIT
 */

/**
 * Checkbox input
 */
class CheckboxInput extends AbstractInput
{
    /**
     * @param string $label
     * @param string $name
     * @param array $value
     * @param array $attributes
     */
    public function __construct(string $label, string $name, array $value = null, $attributes = array())
    {
        //checkbox name should end with [] to send all values
        if (substr($name, -2) !== '[]') {
            $name .= '[]';
        }
        parent::__construct($label, $name, $value, $attributes);
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return 'checkbox';
    }

    /**
     * {@inheritdoc}
     */
    public function show(): string
    {
        $r = '     <div class="radio">' . PHP_EOL .
            '      <label><strong>' . $this->getLabel() . '</strong>: </label>' . PHP_EOL;
        foreach ($this->getAttribute('data') as $k => $v) {
            $r .= '      <label><input id="' . str_replace(
                    '[]',
                    '',
                    $this->getName()
                ) . '_' . $k . '" name="' . $this->getName() . '"  value="' . $k . '" type="' . $this->getType()
                . '" ' . ((in_array($k, $this->getValue())) ? 'checked' : '') . '/> ' . $v . '</label>' . PHP_EOL;
        }
        $r .= '     </div>' . PHP_EOL;
        return $r;
    }
}
