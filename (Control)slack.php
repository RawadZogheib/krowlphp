<?php
require(__DIR__ .'/vendor/autoload.php');
use Maknz\Slack\Client;

require '(Model)getMaxId.inc.php';

$hookUrl  = "https://hooks.slack.com/services/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";
$text = "".$first_name." ".$last_name." just signed up We currently have ".$res["lastId"]." users ".$first_name." attends ".$university_ids." University";

$client = new Client($hookUrl);
$client->send($text);

?>