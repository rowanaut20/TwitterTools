<?php

?>

<html>
<head>
<meta charset="utf8">
<title>Twitter Tools</title>
<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
<div class="row">
<div class="col-sm-4">
<form method="POST" action="getfollowers.php">
  <div class="form-group">
    <label for="formGroupExampleInput">Please enter the Twitter handle you wish to check.</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="twitter_username" placeholder="Enter Twitter handle" required>
  </div>

<button class="btn btn-primary" type="submit">Get their followers!</button>

</form>
</div>
<div class="col-sm-4"></div>
<div class="col-sm-4"></div>
</div>
</body>
</html>
