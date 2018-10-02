<?php
include('./core/controller.php');
Class Bodyweight extends Controller
{
  public function __construct()
  {
          parent::__construct();
          if (!isset($_SESSION['userID'])) { header("Location:login"); }
  }

  public function Go($post)
  {
    if (count($post) > 0 ) {$this->ProcessForm($post);}
    $this->view();
  }
  private function ProcessForm($post)
  {
    include("./core/form.php");
    include_once("./class/jsondb.php");
    $form = new Form();
    $jsonDB = new JsonDB();

    $formCheck = array("bodyweight"=>"required","fatper"=>"required");

    if (!$form->FormCheck($formCheck,$post))
    {
      echo ('Did not save.  Missing required fields. ');
    }
    else
    {
      $jsonDB->WriteDB(
            "./data/bodyweight.json",
            'bodyweight',
            array(
                "datetime"=>date("Y-m-d H:i:s"),
                "weight"=>$post['bodyweight'],
                "fatpercent"=>$post['fatpercent'],
                )
              );

    }

  }

  public function View()
  {
    include_once("./class/jsondb.php");
    $jsonDB = new JsonDB();
    $data = $jsonDB->ReadDB("./data/bodyweight.json");

    include("./view/bodyweight.php");
  }
}
?>
