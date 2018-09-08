<?php
class Form
{
  public function __construct()
  {

  }

  public function FormCheck($formCheck, $post)
  {
    $return = true;
    foreach($formCheck as $field=>$validation)
    {
      switch($validation)
      {
        case "require":
          $return = !$return ? $return : $this->Required($post[$field]);
        break;
      }
    }
    return $return;
  }

  public function Required($field)
  {
    return !empty($field);
  }

}
?>
