<?php
    if(isset($_GET['content'])){
        switch($_GET['content']){
            case "baocaosuco":
                include ("BaoCaoSuCo.php");
                break;
            case "tracuuloi":
                include ("Tracuuloi.php");
                break;    
            case "home":
                include ("Home.php");    
                break;
              
        }
    }else{
		include 'Home.php';
	}

?>