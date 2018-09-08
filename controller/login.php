<?php
include('./core/controller.php');
Class Login extends Controller
{
  public function __construct()
  {
          parent::__construct();
  }

  public function Go($post)
  {
    if (count($post) > 0 ) {$this->ProcessForm($post);}
    $this->View();
  }

  public function View()
  {
    include("./view/login.php");
  }

  private function ProcessForm($post)
  {
    $formCheck = array("user"=>"require","password"=>"require");

    if (!$this->FormCheck($formCheck,$post))
    {
      echo ('Fail[02] '.$this->FormCheck($formCheck,$post));
    }
    else
    {
      //echo ('Suc--'.$this->formCheck($formCheck,$post));

      $userInfo = $this->CheckLogin($post['user']);
      if ($userInfo)
      {
        if ($this->CheckPassword($post['password'],$userInfo['password']))
        {
          $_SESSION['userID'] = $userInfo['email'];
          header("Location:dashboard");
        }
      }
      else {
        echo 'Fail[01]';
      }
    }
  }

  private function FormCheck($formCheck, $post)
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

  private function Required($field)
  {
    return !empty($field);
  }

  private function CheckLogin($user)
  {
    include_once("./class/jsondb.php");
    $db = new JsonDB();
    $rs = $db->ReadDB('./data/users.json');
    if (count($rs) == 0) { return false;}
    return $rs[0];
  }

  private function CheckPassword($suppliedPassWord, $storedPassWord)
  {
    if (password_verify($suppliedPassWord, $storedPassWord))
    {
      return true;
    }
    return false;
  }
}
?>
