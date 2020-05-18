<?php

namespace RadeqBootstrapForm2;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016-2020
 * @license MIT
 */

use RadeqBootstrapForm2\Input\AbstractInput;
use RadeqBootstrapForm2\Model\AttributeTrait;

/**
 * Form with Twitter Bootstrap 3
 */
class Form
{
    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    use AttributeTrait;

    /** @var string */
    private $title;
    /** @var Group */
    private $currentGroup;
    /** @var Groups */
    private $groups;

    /**
     * Create new form
     * @param string $method POST/GET
     * @param string|null $title
     * @param array $attributes
     * @throws Model\FormException
     */
    public function __construct(string $method, ?string $title = null, array $attributes = [])
    {
        $this->setAttribute('method', $method);
        $this->setAttributesBanned(['method']);
        $this->setAttributes($attributes + ['id' => 'form']);
        $this->title = $title;
        $this->groups = new Groups();
    }

    /**
     * Add input
     * @param AbstractInput $ai
     * @return Form
     * @throws Model\FormException
     */
    public function addInput(AbstractInput $ai): self
    {
        //if added file input then set form support to file upload
        if ($ai->getAttribute('type') === 'file') {
            $this->supportFileUpload();
        }
        $this->currentGroup->addInput($ai);
        return $this;
    }

    /**
     * Add form group
     * @param $title
     * @param $description
     * @return bool
     * @throws Model\FormException
     */
    public function addGroup($title, $description): bool
    {
        $this->currentGroup = new Group($title, $description);
        $this->groups->add($this->currentGroup);
        return true;
    }

    /**
     * Set support for file sending over form
     * @return Form
     * @throws Model\FormException
     */
    public function supportFileUpload(): self
    {
        $this->setAttribute('enctype', 'multipart/form-data');
        return $this;
    }

    /**
     * Show form
     * @param string $submitButtonTitle
     * @return string
     */
    public function show(string $submitButtonTitle = 'Sent'): string
    {
        $return = '<form ' . $this->getAttributes() . '>' . PHP_EOL;
        $return .= ($this->title !== null) ? ' <h2>' . $this->title . '</h2>' . PHP_EOL : '';
        /* @var $group Group */
        foreach ($this->groups as $group) {
            $return .= '  <fieldset>' . PHP_EOL .
                (($group->getTitle() !== null) ? '    <legend>' . $group->getTitle() . '</legend>' . PHP_EOL : '') .
                (($group->getDescription() !== null) ? '    <p>' . $group->getDescription() . '</p>' . PHP_EOL : '') .
                '    <div class="form-group">' . PHP_EOL;
            /* @var $input AbstractInput */
            foreach ($group->getInputs() as $input) {
                $return .= '  <div class="form-group">' . PHP_EOL .
                    $input->show() . PHP_EOL .
                    '   </div>';
            }
            $return .= '    </div>' . PHP_EOL .
                '  </fieldset>' . PHP_EOL;
        }
        $return .= '  <div class="form-group">' . PHP_EOL .
            '   <button id="form_send" type="submit" class="btn btn-info">' . $submitButtonTitle . '</button>' . PHP_EOL .
            '  </div>' . PHP_EOL .
            '</form>' . PHP_EOL;
        return $return;
    }
}
