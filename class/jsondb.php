<?php
/*$test = new JsonDB();
$test->WriteDB('x.json','Date',array(date('Y-m-d')));
$d = $test->ReadDB('x.json');
print_r($d['Testing']);

$testx = new JsonDB();
$testx->WriteDB('x.json','Weight',array(359.1));
$d = $test->ReadDB('x.json');
print_r($d);
*/
class JsonDB
{

  function __construct()
  {

  }

  public function ReadDB($fileName)
  {
    return $this->GetData($fileName);
  }

  public function WriteDB($fileName,$dataSetName,$dataSet)
  {

    $data = $this->GetData($fileName);
    $ds = isset($data[$dataSetName]) ? $data[$dataSetName] : array();
    array_push($ds,$dataSet);
    $data[$dataSetName] = $ds;
    $this->WriteFile($fileName,$data);
  }

  private function GetData($fileName)
  {
    $data = array();
    if ($this->CheckForFile($fileName))
    {
      $data = $this->ReadFile($fileName);
    }
    return $data;
  }

  private function ReadFile($fileName)
  {
    return json_decode(file_get_contents($fileName),true);
  }

  private function WriteFile($fileName,$data = array())
  {
    $outputFile = fopen($fileName,"w") or die("Unable to open JSON file.");
    fwrite($outputFile,json_encode($data)) or die("Unable to write JSON file.");
  }

  private function CheckForFile($fileName)
  {
    if (file_exists($fileName))
    {
      return true;
    }
    return false;
  }


}

 ?>
