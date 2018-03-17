<?php
require_once("config.php");

$connection=mysqli_connect('localhost','<username>','<password>','ts');

function new_save($player){
	// $connection=mysqli_connect('localhost','root','','ts');
	global $connection;
	$today=date('Y-m-d');
	$query="insert into dayscore values('".$player."',"."1,'".$today."')";
	$result=mysqli_query($connection,$query);
}

function check_exist($player,$date){
	global $connection;
	$query="select * from dayscore where ign= '".$player."' and date= '".$date."'";
	$result=mysqli_query($connection,$query);
}

function add_count($player){
	global $connection;
	$today=date('Y-m-d');
	$query_get="select count from dayscore where ign= '".$player."' and date= '".$today."'";
	// echo $query_get;
	$result_get=mysqli_query($connection,$query_get);
	if (mysqli_num_rows($result_get)==0){
		new_save($player);
	}else{
		$result_get_array=mysqli_fetch_array($result_get);
		$current=$result_get_array['count'];
		$new=$current+1;
		$query_put="update dayscore set count= ".$new." where ign= '".$player."' AND date= '".$today."'";
		//echo $query_put;
		$result_put=mysqli_query($connection,$query_put);
	}
}

function get_best_day(){
	global $connection;
	$today=date('Y-m-d');
	$query="select * from dayscore where date= '".$today."' ORDER BY count DESC LIMIT 20";
	// echo $query;
	$result=mysqli_query($connection,$query);
	if (mysqli_num_rows($result)!=0){
		$today_best=array();
		$count=0;
		while($row=mysqli_fetch_assoc($result)){
			$today_best[$count]=$row;
			$count+=1;
		}
	}else{
		$today_best="NULL";
	}
	return $today_best;
}

function get_best_week(){
	global $connection;
	//$weeknum=date('W');
	$query="select dayscore.ign, SUM(dayscore.count) as 'count' from dayscore where YEARWEEK(date,1)=YEARWEEK(CURDATE(),1) GROUP BY dayscore.ign ORDER BY count DESC LIMIT 20";
	// echo $query;
	$result=mysqli_query($connection,$query);
	if (mysqli_num_rows($result)){
		$week_best=array();
		$count=0;
		while($row=mysqli_fetch_assoc($result)){
			$week_best[$count]=$row;
			$count+=1;
		}
	}else{
		$week_best="NULL";
	}
	return $week_best;
}

function get_best_month(){
	global $connection;
	$query="select dayscore.ign, SUM(dayscore.count) as 'count' from dayscore where MONTH(date)=MONTH(CURDATE()) GROUP BY dayscore.ign ORDER BY count DESC LIMIT 20";
	$result=mysqli_query($connection,$query);
	if (mysqli_num_rows($result)!=0){
		$month_best=array();
		$count=0;
		while($row=mysqli_fetch_assoc($result)){
			$month_best[$count]=$row;
			$count+=1;
		}
	}else{
		$month_best="NULL";
	}
	return $month_best;
}
?>
