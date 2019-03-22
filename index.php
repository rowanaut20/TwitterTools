<?php

require_once('functions.php');
$twitter = new Twitter();
$globals = $twitter->globals();
?>

<html>
<head>
<meta charset="utf8">
<title>BRFHSPawPrint Tools</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-4">
<h1 class="text-center">Get follower list.</h1>
<form method="post" action="getfollowers.php">
  <div class="form-group">
    <label for="formGroupExampleInput">Please enter the Twitter handle you wish to check.</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="twitter_username" placeholder="Enter Twitter handle" required>
  </div>

<button class="btn btn-primary" type="submit">Get their followers!</button>

</form>
<h1 class="text-center">Get recent tweets.</h1>
<form method="post" action="gettweets.php">
  <div class="form-group">
    <label for="formGroupExampleInput">Please enter the Twitter handle you wish to check.</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="twitter_username" placeholder="Enter Twitter handle" required>
  </div>

<button class="btn btn-primary" type="submit">Get their tweets!</button>

</form>

</div>
<div class="col-sm-4">
<h1 class="text-center">Statistics:</h1>
<p class="text-center"><?= $twitter->get_follower_count($globals->username()); ?> followers. <a href="getfollowers.php?twitter_username=<?= $globals->username(); ?>">Who follows me?</a></p>
<p class="text-center">Following <?= $twitter->get_following_count($globals->username()); ?> people. <a href="getfollowing.php?twitter_username=<?= $globals->username(); ?>">Who am I following?</a></p>
</div>
<div class="col-sm-4">
<h1 class="text-center">Recent Tweets By Me:</h1>
<?php $twitter->get_recent_tweets(3,$globals->username()); ?>
</div>
</div>
</div>
</body>
</html>
