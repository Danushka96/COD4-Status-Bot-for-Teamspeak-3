<?php

require_once("libraries/TeamSpeak3/TeamSpeak3.php");
require_once("cod4.php");
require_once("config.php");
require_once("db.php");

$ts3_server = TeamSpeak3::factory("serverquery://".$server_query.":".$server_password."@".$server_host.":"."10011/?server_port=".$server_port."&nickname=".$server_nickname);

$count = $ts3_server->getProperty("virtualserver_clientsonline");
$max = $ts3_server->getProperty("virtualserver_maxclients");


// TS3 Channel Name Change
$ts3_channel= $ts3_server->channelGetByID($ts_online_channel);
$ts3_channel_name="[cspacer]Online Users: ".$count."/".$max;

// Check whether server is full or not
if ($count==$max){
	$status="(Server Full)";
}else{
	$status="";
}

if ($ts3_channel_name!=$ts3_channel["channel_name"]){
	$ts3_channel["channel_name"]=$ts3_channel_name;
}

// COD4 Channel Name Change
$cod4_channel= $ts3_server->channelGetByID($cod4_online_channel);
$cod4_channel_name="[cspacer]COD4 Players Online: ".$online."/".$maxclient;
if ($cod4_channel_name!=$cod4_channel["channel_name"]){
	$cod4_channel["channel_name"]="[cspacer]COD4 Players Online: ".$online."/".$maxclient." ".$status;
}
if (array_key_exists('players', $data['quakeserver'])){
	$var=$data['quakeserver']['players'];
	// COD4 Channel Description Change
	$des="
	[center][size=13][b][I]Server Status[/b][/center]
	[center][IMG]https://image.gametracker.com/images/maps/160x120/cod4/".$mapname.".jpg[/IMG][/center]

	[COLOR=#0055ff]MAP Name[/COLOR]     :".$mapname." 
	[COLOR=#0055ff]up-time[/COLOR]          :".$uptime." 
	[COLOR=#0055ff]Map star-time[/COLOR]:".$mapstart." 

	 [b]Online Players Now:[/b]";

	$bestscore= array($var[0]['nick'],$var[0]['frags']);
	for ($i=0; $i < sizeof($var); $i++){
		$p_name=$var[$i]['nick'];
		add_count($p_name);
		$player="[left]".($i+1).". [COLOR=#ff0000]".$var[$i]['nick']."[/color][/left]";
		$des=$des.$player;
		if ($var[$i]['frags']>$bestscore[1]){
			$bestscore[0]=$var[$i]['nick'];
			$bestscore[1]=$var[$i]['frags'];
		}
	}
}else{
	$des="";
	$bestscore=array("NULL","NULL");
}
$cod4_channel["channel_description"]=$des;

if ($bestscore[1]=="NULL"){
	$bestplayer= "No Players Online";
	$bestmarks="";
}else{
	$bestplayer=$bestscore[0];
	$bestmarks=$bestscore[1];
}

$ts3_best_player= $ts3_server->channelGetByID($best_score_channel);
$best_player="[cspacer]Best Player Online: ".$bestplayer." (".$bestmarks.")";
if ($ts3_best_player['channel_name']!=$best_player){
	$ts3_best_player['channel_name']=$best_player;
}


?>