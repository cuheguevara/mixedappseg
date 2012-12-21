
<?php
//$me = $mentionsList[0];
echo "<pre>";
print_r($mentionsList);
echo "</pre>";
//exit;

foreach ($me['user'] as $r){
	echo $r['screen_name']."<br/>";
}

?>
