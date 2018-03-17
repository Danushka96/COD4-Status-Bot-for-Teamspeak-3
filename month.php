<?php
include_once('db.php');
require_once("libraries/TeamSpeak3/TeamSpeak3.php");
require_once("config.php");

$ts3_server = TeamSpeak3::factory("serverquery://".$server_query.":".$server_password."@".$server_host.":"."10011/?server_port=".$server_port."&nickname=Month_ranker");

$today=get_best_month();
$ts3_channel= $ts3_server->channelGetByID($month_best);
if ($ts3_channel['channel_name']!="[cspacer] Player of the Month: ".$today[0]['ign']){
	$ts3_channel['channel_name']="[cspacer] Player of the Month: ".$today[0]['ign'];
}
$des="[center][B] CHECK YOUR RANKS (WEEK) [/B] [/center] Updates at Everyday Saturday 7.00 PM (GTM +5.30)
";

for ($i=0; $i < sizeof($today); $i++){
		$player_des="[left]".($i+1).". [COLOR=#ff0000]".$today[$i]['ign']."[/color][/left]";
		$des=$des.$player_des;
	}

$ts3_channel["channel_description"]=$des;
?>