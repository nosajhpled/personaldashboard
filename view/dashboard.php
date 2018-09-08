<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width">
    <script src=""></script>
    <link rel="stylesheet" type="text/css" href="">
    <style>

    .block{width: 75px;
      height:75px;
      border: 1px solid black;
      margin: 5px;
      float: left;
    }
    .blockText{height: 75px; width: 75px;display: table-cell;text-align: center;
    vertical-align: middle;}
    </style>
</head>
<body>
<h3>Dashboard</h3>

<div class="block">
<a href="bloodpressure" /><span class="blockText">Blood Pressure</span></a>
</div>

<div class="block">
<span class="blockText">Weight</span>
</div>

<div class="block">
<span class="blockText">Body Fat %</span>
</div>

<div class="block">
<span class="blockText">Gym Log</span>
</div>


<div class="block">
  <a href="logout" />
<span class="blockText">Log Out</span> </a>
</div>

</body>
</html>
