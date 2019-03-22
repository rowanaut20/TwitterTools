<?php

require_once('functions.php');

$twitter = new Twitter();

$connection = $twitter->connect();

$username= $_REQUEST['twitter_username'];

echo "<a role='btn' class='btn btn-primary' href='index.php'>Go Back<br></a>";

  $friends = $connection->get('friends/list', array('screen_name' => $username, 'count' => 200));
  foreach ($friends->users as $row) {
  echo "<a target='_blank' href='https://twitter.com/".$row->screen_name."'>@".$row->screen_name."</a><br>";
  }

?>
