<?php 
	session_start();
		
	$SC_ID = $_GET['SC_ID'];
	$NV_ID = $_GET['NV_ID'];
	
	//insert data to SQL;
	
	
	$_SESSION['message'] = "da phan cong";
	
	header('Location: index.php?content=danhsachsuco');
?>