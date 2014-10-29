<?php

namespace model;

/**
 * Tworzenie formularza zgodego z Twitter Bootstrap
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2014 
 * @license MIT
 */
class Form
{

  private $title;
  private $form_in = array(), $fields = array(), $support_in = array();

  /**
   * @param string $title tytuł formularza
   * @param array $form_in parametry wewnątrz elementu form (np. class, method [domyślnie POST], action)
   * @param array $support_in możliwe rodzaje pól
   */
  public function __construct($title = NULL, array $form_in = array(), array $support_in = array('Text', 'Radio', 'Checkbox'))
  {
    $this->title = $title;
    if (!isset($form_in['method']))
      $form_in['method'] = 'POST';
    $this->form_in = $form_in;
    $this->support_in = $support_in;
  }

  /**
   * Ustawia możliwość przesyłania plików przez formularz
   */
  public function set_file_upload()
  {
    $this->form_in['enctype'] = 'multipart/form-data';
  }

  /**
   * Dodaje grupę (fieldset) do której można dodać pola
   * @param string $name nazwa grupy (wartość unikalna lub zostanie nadpisana)
   * @param string $desc opis grupy
   */
  public function add_group($name, $desc = NULL)
  {//dodaje element dostępny w 
    $this->fields[$name]['name'] = $name;
    $this->last_field = $name; //??
    $this->fields[$name]['desc'] = $desc;
    $this->fields[$name]['in'] = array();
  }

  /**
   * Dodaje pole formularza
   * @param string $text tekst w label
   * @param string $name nazwa inputu
   * @param string $type typ (Input|Password|Radio)
   * @param string $group grupa, null=najnowsza
   * @return \model\FormInInput
   */
  public function in_new($text, $name, $type = 'Text', $group = null)
  {
    if (!$group)
      $group = $this->last_field; //jeśli nie określono do którego to dodaj do ostatniego
    if (in_array($type, $this->support_in)) {
      $act = '\model\FormIn' . $type;
      $a = new $act($text, $name);
    } else {
      $a = new \model\FormInText($text, $name);
      $a->set_type($type);
    }
    $this->fields[$group]['in'][$name] = $a;
    return $a;
  }

  /**
   * Wyświetla formularz
   * @return string
   */
  public function show()
  {
    //print_r($this->fields)
    $ciag = '<form id="form"' . $this->get_form_in() . '>' . PHP_EOL;
    $ciag.=(!empty($this->title)) ? ' <h2>' . $this->title . '</h2>' . PHP_EOL : '';
    foreach ($this->fields as $v) {//pętla dla pól
      $ciag.= '  <fieldset>' . PHP_EOL .
              ((isset($v['name'])) ? '    <legend>' . $v['name'] . '</legend>' . PHP_EOL : '') .
              ((isset($v['desc'])) ? '    <p>' . $v['desc'] . '</p>' . PHP_EOL : '') .
              '    <div class="form-group">' . PHP_EOL;
      if (isset($v['in'])) {
        foreach ($v['in'] as $inp) {
          $ciag.=$inp->show();
        }
      }
      $ciag.='    </div>' . PHP_EOL .
              '  </fieldset>'. PHP_EOL;
    }
    $ciag.='  <div class="form-group">' . PHP_EOL .
            '   <button id="form_send" type="submit" class="btn btn-info">Wyślij</button>' . PHP_EOL .
            '  </div>' . PHP_EOL .
            '</form>' . PHP_EOL;
    return $ciag;
  }

  /**
   * Formatuje dane
   * @uses $this->form_in
   * @return string
   */
  private function get_form_in()
  {
    $r = '';
    foreach ($this->form_in as $k => $v) {
      $r.=' ' . $k . '="' . $v . '"';
    }
    return $r;
  }

}

?>
