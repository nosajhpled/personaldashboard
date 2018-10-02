<!DOCTYPE html>
<html>
<head>
    <title>Blood Pressure</title>
    <meta name="viewport" content="width=device-width">
    <script src=""></script>
    <link rel="stylesheet" type="text/css" href="">
<style type="text/css">
.fillInNumber {width:100px;height:50px;font-size: 20px;}
.submit{width:185px;height:50px;font-size: 20px;}
body{font-size: 20px;}
.content {padding-top: 5px; width:350px;margin: auto;}
table td {border:1px solid black; padding: 5px;}
.returnButton{text-decoration: none; border: 1px solid black;padding: 5px; color: white; background-color: grey;}
.bpNormal{background-color: #A3BC47}
.bpElevated{background-color: #FEDB55}
.bpHigh1{background-color: #FCBD52}
.bpHigh2{background-color: #F79F3B}
.bpCrisis{background-color: #EE523E}
</style>
</head>
<body>
<div class="content">

<form method="post">
  <h3>Blood Pressure</h3>
  <a class="returnButton" href="dashboard">Return to Dashboard</a><br><br>
<input type="number" class="fillInNumber" name="systolic" id="systolic" /> Systolic
<br><br>
<input type="number" class="fillInNumber" name="diastolic" id="diastolic" /> Diastolic
<br><br>
<input type="submit" class="submit" />


</form>
<br><br>

<table>
  <tr><th>Date</th><th>Blood Pressure</th></tr>
  <?php
    $dataSet = $bpData['bloodpressure'];
    arsort($dataSet);
    foreach($dataSet as $row)
    {
      echo '<tr class="'.(BPColor($row['systolic'],$row['diastolic'])).'"><td>'.$row['datetime'].'</td><td>'.$row['systolic'].'/'.$row['diastolic'].'</td></tr>';
    }
  ?>

</table>
</div>
</body>
</html>
<?php
function BPColor($systolic,$diastolic)
{
  switch (true)
  {
    case ($systolic < 120 && $diastolic < 80):
      return "bpNormal";
      break;
    case ($systolic >= 120 && $systolic <= 129 && $diastolic < 80):
      return "bpElevated";
      break;
    case (($systolic >= 130 && $systolic <= 139) || ($diastolic >= 80 && $diastolic <= 89)):
      return "bpHigh1";
      break;
    case (($systolic >= 140 && $systolic <= 180) || ($diastolic >= 90 && $diastolic <= 120)):
      return "bpHigh2";
      break;
    case ($systolic > 180 || $diastolic > 120):
      return "bpCrisis";
      break;

  }
}
?>
