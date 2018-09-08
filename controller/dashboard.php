<?php
include('./core/controller.php');
Class Dashboard extends Controller
{
  public function __construct()
  {
          parent::__construct();
          if (!isset($_SESSION['userID'])) { header("Location:login"); }
  }

  public function Go($post)
  {
    $this->view();
  }

  public function View()
  {
    include("./view/dashboard.php");
  }
}
?>
