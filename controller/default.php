<?php
include('./core/controller.php');
Class Default extends Controller
{
  public function __construct()
  {
          parent::__construct();
  }

  public function Go($post)
  {
    $this->view();
  }

  public function View()
  {
    include("./view/.php");
  }
}
?>
