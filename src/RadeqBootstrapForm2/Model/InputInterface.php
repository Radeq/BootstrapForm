<?php

namespace RadeqBootstrapForm2\Model;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016-2020
 * @license MIT
 */

/**
 * Form item interface
 */
interface InputInterface
{
    /**
     * Get input type
     * @return string
     */
    public function getType(): string;

    /**
     * Show input
     * @return string
     */
    public function show(): string;
}
