<?php
$servers['quakeserver'] = array('quake3', 'Server_ip_here', '28960');


require_once 'gameq/GameQ.php';

// Initialize the class
$gq = new GameQ;

// Add the servers we just defined
$gq->addServers($servers);

// Request the data, and display it
try {
    $data = $gq->requestData();
    //print_r($data);
}

// Catch any errors that might have occurred
catch (GameQ_Exception $e) {
    echo 'An error occurred.';
}
$servername=$data['quakeserver']['sv_hostname'];
// $maxping=$data['quakeserver']['sv_maxPing'];
// $voice=$data['quakeserver']['voice'];
// $version=$data['quakeserver']['shortversion'];
$maxclient=$data['quakeserver']['sv_maxclients'];
$online=$data['quakeserver']['g_humanplayers'];
$mapname=$data['quakeserver']['mapname'];
//$modname=$data['quakeserver']['fs_game'];
$mapstart=$data['quakeserver']['g_mapStartTime'];
$uptime=$data['quakeserver']['uptime'];



?>
