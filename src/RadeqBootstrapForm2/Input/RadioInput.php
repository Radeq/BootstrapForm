<?php

namespace RadeqBootstrapForm2\Input;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016-2020
 * @license MIT
 */

/**
 * Radio input
 */
class RadioInput extends AbstractInput
{
    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return 'radio';
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
                . '" ' . (($v === $this->getValue()) ? 'checked' : '') . '/> ' . $v . '</label>' . PHP_EOL;
        }
        $r .= '     </div>' . PHP_EOL;
        return $r;
    }
}
