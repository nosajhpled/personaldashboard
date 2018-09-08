<!DOCTYPE html>
<html>
<head>
    <title>Personal Dashboard</title>
    <meta name="viewport" content="width=device-width">
    <script src=""></script>
    <script type="text/javascript">

    </script>
    <style>
.row {padding: 5px;}
.hcenter{margin: auto;}
#formSection { padding-top: 30px; padding-left: 50px; width: 250px; height: 175px; border: 1px solid black; margin-top:25px}
label {display: block; width:85px;  text-align:right; float: left; padding-right: 5px; padding-bottom: 10px}
input {padding:5px;}
    </style>
</head>
<body>
<div class="row hcenter" id="formSection" name="formSection">
<form method="post">

User<br><input type="text" name="user" id="user" value="" /><br><br>
Password<br><input type="password" name="password" id="password" value="" />
<br><br>
<input type="submit" name="submit" id="submit" value="Submit" />

</form>
</div>
</body>
</html>
