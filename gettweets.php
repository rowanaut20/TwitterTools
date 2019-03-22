<html>
<head>
<meta charset="utf8">
<title>@<?= $_POST['twitter_username']; ?>'s recent tweets</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php
require_once('functions.php');
echo "<a role='btn' class='btn btn-primary' href='index.php'>Go Back</a>";
$twitter = new Twitter();

$twitter->get_recent_tweets(10,$_POST['twitter_username']);

?>
</body>
</html>
