<?php

namespace RadeqBootstrapForm2\Model;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016-2020
 * @license MIT
 */

/**
 * Trait for attributes
 * it's a case of form over content ;)
 */
trait AttributeTrait
{
    /** @var array */
    protected $attributes = [];
    /**
     * Restricted input attributes
     * @var array
     */
    protected $attributesBanned = [];

    /**
     * Add attribute
     * @param string $name
     * @param string $value
     * @return self
     * @throws FormException
     */
    public function setAttribute($name, $value): self
    {
        if ($this->isAttributeBanned($name) === true) {
            throw new FormException('Attribute ' . $name . ' is reserved');
        }
        $this->attributes[$name] = $value;
        return $this;
    }

    /**
     * Set attributes
     * @param array $attributes
     * @return self
     */
    public function setAttributes(array $attributes): self
    {
        foreach ($attributes as $name => $value) {
            $this->setAttribute($name, $value);
        }
        return $this;
    }

    /**
     * Set restricted attributes
     * @param $attributesBanned
     * @return self
     */
    public function setAttributesBanned($attributesBanned): self
    {
        $this->attributesBanned = $attributesBanned;
        return $this;
    }

    /**
     * Get attribute value
     * @param string $name
     * @return string|null null also if not exist
     */
    public function getAttribute($name)
    {
        return array_key_exists($name, $this->attributes) ? $this->attributes[$name] : null;
    }

    /**
     * Get serialized attributes
     * @return string
     */
    protected function getAttributes(): string
    {
        $r = '';
        foreach ($this->attributes as $k => $v) {
            $r .= ' ' . $k . '="' . $v . '"';
        }
        return $r;
    }

    /**
     * Check is attribute restricted
     * @param string $name
     * @return boolean
     */
    private function isAttributeBanned($name): bool
    {
        return in_array($name, $this->attributesBanned);
    }
}
