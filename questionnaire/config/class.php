<?php
class user{
	function login($username,$password){
		$query=mysql_query("SELECT * FROM `user` WHERE '$username'=`username`");
		$result=mysql_fetch_array($query);
		$a=rand(100000,999999);
		$b=rand(100000,999999);
		$str=$a.$b;
	    $str=md5($str);
		if ($password==$result['password']){
			mysql_query("UPDATE `user` SET `session`='$str' WHERE '$username'=`username`");
			$_SESSION['logindata']=$str;
			$_SESSION['username']=$username;
		}
	}
	function check_status(){
		$username=$_SESSION['username'];
		$userdata=$_SESSION['logindata'];
		$query=mysql_query("SELECT * FROM `user` WHERE '$username'=`username`");
		$result=mysql_fetch_array($query);
		if ($userdata==$result['userdata']){
			return "yes";
		}else{return "denied";}
	}
	function register($username,$password,$email){
		
	}
}