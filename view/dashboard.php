<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width">
    <script src=""></script>
    <link rel="stylesheet" type="text/css" href="">
    <style>

    .block{width: 225px;
      height:225px;
      border: 1px solid black;
      margin: 5px;
      float: left;
      font-size: 1.5em;
    }

    a:link{color: black;}
    a:visited{color: black;}

    .blockText{height: 225px; width: 225px;display: table-cell;text-align: center;
    vertical-align: middle;}
    #bloodpressure {background-color: red;}
    #bodyweight{background-color: grey;}
    #gymlog{background-color: blue; color:white;}
    #logout{background-color: black; color:white;}
    #header{width:100%;text-align: center;font-size: 1.5em; border-bottom: 1px solid black; margin-bottom: 10px;}
    </style>
</head>
<body>
<div id="header">
Dashboard
</div>

<a href="bloodpressure" />
<div class="block" id="bloodpressure">
<span class="blockText">Blood Pressure</span>
</div>
</a>

<a href="bodyweight" />
<div class="block" id="bodyweight">
<span class="blockText">Body Weight</span>
</div>
</a>


<div class="block" id="gymlog">
<span class="blockText">Gym Log</span>
</div>

<a href="logout" />
<div class="block" id="logout">
<span class="blockText">Log Out</span>
</div>
</a>

</body>
</html>
