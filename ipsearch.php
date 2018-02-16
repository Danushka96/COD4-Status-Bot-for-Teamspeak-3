<?php
$ip = "139.59.96.53"; // the IP address to query
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success') {
  echo 'Hello visitor from '.$query['country'].', '.$query['countryCode'].'!';
} else {
  echo 'Unable to get location';
}
?>