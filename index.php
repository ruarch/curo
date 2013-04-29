<?php
require('curo.php');

if(!$curo_url->segment(1)){
	$page ='home';
	$page_name = $curo_url->segment(1);
}else{
    $page = $curo_url->segment(1);
}


switch($page){
    case 'home':
        include 'home.php';
    break; 

  
    default:
        include 'pages.php';
    break;
}


?>