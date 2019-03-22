<?php
require_once('twitteroauth/twitteroauth.php');
require_once('globals.php');

class Twitter {

function globals() {
  return new Globals();
}

function connect() {
 $g = $this->globals();
 return new TwitterOAuth($g->getConsumerKey(), $g->getConsumerSecret(), $g->getAccessToken(), $g->getAccessTokenSecret());
}

function get_follower_count($username) {
 $connection = $this->connect();
 $followers = $connection->get('followers/list', array('screen_name' => $username, 'count' => 200));
 $followersArr = array();
 foreach ($followers->users as $row) {
	$followersArr[]['val']=$row->screen_name;
 }

 return count($followersArr);
}

function is_following($followingwho,$arethey) {
  $connection = $this->connect();
  $friends = $connection->get('friends/list', array('screen_name' => $arethey));
  foreach ($friends->users as $row) {
    if($row->screen_name == $followingwho) {
      return true;
    } else {
     return false;
   }
  }
  return false;
}

function get_following_count($username) {
  $connection = $this->connect();
  $friends = $connection->get('friends/ids', array('screen_name' => $username));
  $friendsArr = array();
  foreach ($friends->ids as $row) {
    $friendsArr[]['val'] = $row;
  }
  return count($friendsArr); 
}

function get_recent_tweets($amount,$username) {

  $connection = $this->connect();
  $tweets = $connection->get('statuses/user_timeline', array('screen_name' => $username, 'count' => $amount));
  foreach($tweets as $tweet) {
    ?>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">@<?= $tweet->user->screen_name; ?></h5>
        <p class="card-text"><?= $tweet->text; ?></p>
        <p class="card-text"><small class="text-muted"><?= $this->time_elapsed_string($tweet->created_at);?></small></p>
      </div>
    </div>
  </div>
</div>

    <?php
  }

}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

}
?>
