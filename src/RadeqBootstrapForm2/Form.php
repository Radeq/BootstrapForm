<?php

namespace RadeqBootstrapForm2;

/**
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2016 
 * @license MIT
 */
use RadeqBootstrapForm2\Input\AbstractInput;
use RadeqBootstrapForm2\Model\AttributeTrait;

/**
 * Tworzenie formularza zgodnego z Twitter Bootstrap
 */
class Form {
    const methodPost = 'POST';
    const methodGet = 'GET';

    use AttributeTrait;

    /** @var string */
    private $title;

    /** @var Group */
    private $currentGroup;

    /** @var Groups */
    private $groups;

    /**
     * @param string $title Wyświetlana nazwa formularza
     */
    public function __construct($method, $title = null) {
        $this->setAttribute('method', $method);
        $this->title = $title;
        $this->groups = new Groups();
    }

    /**
     * Dodaje pole
     * @param AbstractInput $ai
     * @return Form
     */
    public function addInput(AbstractInput $ai) {
        if ($ai->getAttribute('type') === 'file') {
            $this->supportFileUpload(); //dodaje wsparcie wysyłania plików w formularzu
        }
        $this->currentGroup->addInput($ai);
        return $this;
    }

    public function addGroup($title, $description) {
        $this->currentGroup = new Group($title, $description);
        $this->groups->add($this->currentGroup);
    }

    /**
     * Ustawia możliwość przesyłania plików przez formularz
     * @return Form
     */
    public function supportFileUpload() {
        $this->setAttribute('enctype', 'multipart/form-data');
        return $this;
    }

    /**
     * Wyświetla formularz wraz z polami
     * @return string
     */
    public function show() {
        $ciag = '<form id="form"' . $this->getAttributes() . '>' . PHP_EOL;
        $ciag .= ($this->title !== null) ? ' <h2>' . $this->title . '</h2>' . PHP_EOL : '';
        /* @var $group Group */
        foreach ($this->groups as $group) {
            $ciag.= '  <fieldset>' . PHP_EOL .
                    (($group->getTitle() !== null) ? '    <legend>' . $group->getTitle() . '</legend>' . PHP_EOL : '') .
                    (($group->getDescription() !== null) ? '    <p>' . $group->getDescription() . '</p>' . PHP_EOL : '') .
                    '    <div class="form-group">' . PHP_EOL;
            /* @var $input \RadeqBootstrapForm2\Input\AbstractInput */
            foreach ($group->getInputs() as $input) {
                $ciag .= '  <div class="form-group">' . PHP_EOL .
                        $input->show() . PHP_EOL .
                        '   </div>';
            }
            $ciag.='    </div>' . PHP_EOL .
                    '  </fieldset>' . PHP_EOL;
        }

        $ciag.='  <div class="form-group">' . PHP_EOL .
                '   <button id="form_send" type="submit" class="btn btn-info">Wyślij</button>' . PHP_EOL .
                '  </div>' . PHP_EOL .
                '</form>' . PHP_EOL;
        return $ciag;
    }

}
