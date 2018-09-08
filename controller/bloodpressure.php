<?php
include('./core/controller.php');
Class Bloodpressure extends Controller
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

    $formCheck = array("systolic"=>"require","diastolic"=>"require");

    if (!$form->FormCheck($formCheck,$post))
    {
      echo ('Did not save.  Missing required fields. ');
    }
    else
    {
      $jsonDB->WriteDB(
            "./data/bloodpressure.json",
            'bloodpressure',
            array(
                "datetime"=>date("Y-m-d H:i:s"),
                "systolic"=>$post['systolic'],
                "diastolic"=>$post['diastolic']
                )
              );

    }

  }

  public function View()
  {
    include_once("./class/jsondb.php");
    $jsonDB = new JsonDB();
    $bpData = $jsonDB->ReadDB("./data/bloodpressure.json");

    include("./view/bloodpressure.php");
  }
}
?>
