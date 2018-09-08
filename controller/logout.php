<?php
include('./core/controller.php');
Class Logout extends Controller
{
  public function __construct()
  {
    parent::__construct();
    session_unset();
  }

  public function Go($post)
  {
    $this->view();
  }

  public function View()
  {
        header("location:login");
  }


}
$controller = new Logout();
?>
