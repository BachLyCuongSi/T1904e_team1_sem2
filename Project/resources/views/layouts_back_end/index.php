<?php 
session_start();

  include_once('config/connect.php');
  $check = false;

    if($check){
        include_once('admin.php');
    }else{
        include_once('login.php');
    }


?>