<?php

require_once('functions.php');

$twitter = new Twitter();

$connection = $twitter->connect();

$username= $_REQUEST['twitter_username'];

echo "<a role='btn' class='btn btn-primary' href='/dir/twitter/index'>Go Back</a>";

$saveArr = array();
$followers1 = $connection->get('followers/list', array('screen_name' => $username, 'count' => 200));
$followersArr=array();		

foreach ($followers1->users as $row) {
	$saveArr[]['name']=$row->name;
	$followersArr[]['val']=$row->screen_name;
}

echo "<h1>@".$username."'s followers (".count($followersArr)."):<br></h1>";

if(count($followersArr) === 0) { 

echo "<h2>No followers :(</h2>";

} else {

$count = 0;

sort($followersArr);

foreach ($followersArr as $follow) {
    $val = $follow['val'];
    echo "<a target='_blank' href='https://twitter.com/".$val."'>@".$val."</a><br>";
    $count += 1;
}

}

?>
