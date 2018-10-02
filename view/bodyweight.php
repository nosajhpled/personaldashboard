<!DOCTYPE html>
<html>
<head>
    <title>Blood Pressure</title>
    <meta name="viewport" content="width=device-width">
    <script src=""></script>
    <link rel="stylesheet" type="text/css" href="">
<style type="text/css">
.fillInNumber {width:100px;height:50px;font-size: 20px; margin-bottom: 5px;}
.submit{width:185px;height:50px;font-size: 20px;}
body{font-size: 20px;}
.content {padding-top: 5px; width:325px;margin: auto;}
table td {border:1px solid black; padding: 5px;}

.returnButton{text-decoration: none; border: 1px solid black;padding: 5px; color: white; background-color: grey;}
</style>
</head>
<body>
<div class="content">

<form method="post">
  <h3>Body Weight</h3>
  <a class="returnButton" href="dashboard">Return to Dashboard</a><br><br>
<input type="text" class="fillInNumber" name="bodyweight" id="bodyweight" /> Weight
<br>
<input type="text" class="fillInNumber" name="fatpercent" id="fatpercent" /> Body Fat %
<br><br>
<input type="submit" class="submit" />


</form>
<br><br>

<table>
  <tr><th>Date</th><th>Body Weight</th><th>Body Fat %</th><th>Weight<br>Gain/Loss</th><th>Body Fat</th><th>Body Fat<br>Gain Loss</th></tr>
  <?php
    if (isset($data['bodyweight'])) {
    $dataSet = $data['bodyweight'];
    $calcDataSet = array();
    $lastEntry['weight'] = 0;
    $lastEntry['fatpercent'] = 0;
    foreach($dataSet as $row)
    {
      $row['gainloss']['weight'] = ( $lastEntry['weight'] != 0 ? ($row['weight'] - $lastEntry['weight']) : 0  );
      $row['gainloss']['fatpercent'] = ( $lastEntry['fatpercent'] != 0 ? ((isset($row['fatpercent']) ? $row['weight']*($row['fatpercent']/100) : 0) - $lastEntry['fatpercent']) : 0  );
      array_push($calcDataSet,$row);
      $lastEntry['weight'] = $row['weight'];
      $lastEntry['fatpercent'] = (isset($row['fatpercent']) ? $row['weight']*($row['fatpercent']/100) : 0);
    }

    arsort($calcDataSet);

    foreach($calcDataSet as $row)
    {
      echo '<tr>
      <td>'.$row['datetime'].'</td>
      <td>'.$row['weight'].'</td>
      <td>'.(isset($row['fatpercent']) ? $row['fatpercent'] : 0).'</td>
      <td>'.round($row['gainloss']['weight'],2).'</td>
      <td>'.(isset($row['fatpercent']) ? $row['weight']*($row['fatpercent']/100) : 0).'</td>
      <td>'.round($row['gainloss']['fatpercent'],2).'</td>
      </tr>';

    }
  }
  ?>

</table>
</div>
</body>
</html>
