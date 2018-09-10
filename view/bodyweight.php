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
.content {padding-top: 5px; width:325px;margin: auto;}
table td {border:1px solid black; padding: 5px;}
form {text-align: center;}
.returnButton{text-decoration: none; border: 1px solid black;padding: 5px; color: white; background-color: grey;}
</style>
</head>
<body>
<div class="content">

<form method="post">
  <h3>Body Weight</h3>
  <a class="returnButton" href="dashboard">Return to Dashboard</a><br><br>
<input type="text" class="fillInNumber" name="bodyweight" id="bodyweight" /> Weight

<br><br>
<input type="submit" class="submit" />


</form>
<br><br>

<table>
  <tr><th>Date</th><th>Body Weight</th><th>Gain/Loss</th></tr>
  <?php
    if (isset($data['bodyweight'])) {
    $dataSet = $data['bodyweight'];
    $calcDataSet = array();
    $lastEntry = 0;
    foreach($dataSet as $row)
    {
      $row['gainloss'] = ( $lastEntry != 0 ? ($row['weight'] - $lastEntry) : 0  );
      array_push($calcDataSet,$row);
      $lastEntry = $row['weight'];
    }

    arsort($calcDataSet);

    foreach($calcDataSet as $row)
    {
      echo '<tr><td>'.$row['datetime'].'</td><td>'.$row['weight'].'</td><td>'.$row['gainloss'].'</td></tr>';

    }
  }
  ?>

</table>
</div>
</body>
</html>
