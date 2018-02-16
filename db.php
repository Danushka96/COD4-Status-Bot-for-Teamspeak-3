<?php
require_once("config.php");

$connection=mysqli_connect($host,$username,$password,$db);

function new_save($player){
	$today=date('Y-m-d');
	$query="insert into dayscore values(".$player.","."1".$today.")";
	$result=mysqli_query($connection,$query);
}

function check_exist($player,$date){
	$query="select * from dayscore where ign= ".$player." and date= ".$date;
	$result=mysqli_query($connection,$query);
}

function add_count($player){
	$today=date('Y-m-d');
	$query_get="select count from dayscore where ign= ".$player." and date= ".$date;
	$reult_get=mysqli_query($connection,$query);
	if (mysqli_num_rows($result_get)==0){
		new_save($player);
	}else{
		$result_get_array=mysqli_fetch_array($result_get);
		$current=$result_get_array['count'];
		$new=$current+1;
		$query_put="update dayscore set count= ".$new." where ign= ".$player." AND date= ".$date;
		$result_put=mysqli_query($connection,$query_put);
	}
}

function get_best_day(){
	$today=date('Y-m-d');
	$query="select * from dayscore where date= ".$today." ORDER BY count LIMIT 20";
	$result=mysqli_query($connection,$query);
	if (mysqli_num_rows($result)!=0){
		$today_best=mysqli_fetch_array($result);
	}else{
		$today_best="NULL";
	}
	return $today_best;
}

function get_best_week(){
	//$weeknum=date('W');
	$query="select * from dayscore where YEARWEEK('date',1)=YEARWEEK(CURDATE(),1) ORDER BY count LIMIT 20";
	$result=mysqli_query($connection,$query);
	if (mysqli_num_rows($result)){
		$week_best=mysqli_fetch_array($result);
	}else{
		$week_best="NULL";
	}
	return $week_best;
}

function get_best_month(){
	$query="select * from dayscore where MONTH('date')=MONTH(CURDATE()) ORDER BY count LIMIT 20";
	$result=mysqli_query($connection,$query);
	if (mysqli_num_rows($result)!=0){
		$month_best=mysqli_fetch_array($result);
	}else{
		$month_best="NULL";
	}
	return $month_best;
}
?>