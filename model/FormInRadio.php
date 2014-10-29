<?php
namespace model;
/**
 * Pole typu radio
 * @author Radosław Barteczko
 * @copyright "Usługi IT Radosław Barteczko" 2014 
 * @license MIT
 */
class FormInRadio extends FormIn
{
  private $check;
  
  /**
   * Określ możliwe wartości pola
   * @param array $value array('nazwa'=>'opis')
   * @return \model\FormInRadio
   * @throws Exception
   */
  public function set_value($value)
  {
    if (!is_array($value)) throw new Exception('Value must be array');
    $this->value=$value;
    return $this;
  }
  
  /**
   * Zaznacza element o wybranej nazwie
   * @param string $name klucz z $value
   * @return \model\FormInRadio
   */
  public function check($name)
  {
    $this->check=$name;
    return $this;
  }


  public function show()
  {
    $r='    <div class="radio">'.PHP_EOL.
        '      <label><strong>'.$this->label.'</strong>: </label>'.PHP_EOL;
    foreach ($this->value as $k=>$v)
    {
      $r.='      <label><input type="radio" name="'.$this->name.'" id="'.$this->name.'_'.$k.'" value="'.$k.'" '.(($k===$this->check)?'checked':'').'>'.$v.'</label>'.PHP_EOL;
    }
    $r.='    </div>'.PHP_EOL;
    return $r;
  }
}

?>
