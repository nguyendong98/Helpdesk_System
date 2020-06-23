<?php
	// session_start();
	include './process/process.php';
?>


<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>List of FAQ</title>
		<link rel="stylesheet" href="css/style.css">
		<style>
			
			body {
				margin: 10px;
				background: whitesmoke;
			}
			#faqtable th,td
			{
				padding: 10px;
				
			}
			#frmfaq {
				text-align: center;
				width: 100%;
				background: #eef9f0;
				box-shadow: 2px 2px 10px -1px rgba(0,0,0,0.75);
				padding-bottom: 1rem;
				
			}
			#faqtable {
				width: 100%;
				text-align: left;
			}
			#faqtable img {
				width: 150px;
				
				height: 150px;
				
				
			}
		
		
		</style>
		
	</head>
	
	
	<body>
		<div id ="container">
		<div id="Header" style="text-align: center; background: #ddede0; padding: 16px;">
        	<div style="font-size: 20px; font-weight: bold">LIST OF FAQ</div>
        </div>
		<div id="newfaq">
			<form id= "frmfaq" name ="frmfaq" method = "post" action="" enctype="multipart/form-data">
				<table class="table table-striped w-100">
					<tr class="text-align-center">
						<th> Trouble name </th>
						<th> Image </th>
						<th> Detail </th>
						<th> How to fix </th>
					</tr>
					<?php
						$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:2; //số item trên 1 trang
						$current= !empty($_GET['page'])?$_GET['page']:1;    // trang hiện tại
						$offset = ($current - 1) * $item_per_page;      // item bắt đầu của mỗi trang
		
						$total_item_query = mysqli_query($conn, "SELECT * FROM faq");
						$total_item = mysqli_num_rows($total_item_query);  // tổng số item
						//$result=mysqli_query($conn, $sql);
						$total_page= ceil($total_item/$item_per_page); //tổng số trang
						$sql = "SELECT * FROM faq ORDER BY idfaq DESC LIMIT ".$item_per_page." OFFSET ".$offset." ";
						$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_assoc($result)){
							?>
								<tr>
									
									<td><?=$row['tensuco']?></td>
									<td ><img style="width: 50px; height: 50px" src="<?=$row['hinhanhsuco']?>"></td>
									<td><?=$row['chitiet']?></td>
									<td><?=$row['khacphuc']?></td>
								</tr>
							<?php } }

							else {
								echo "<script> 
									
									alert('Error sql!');
										
								</script>";
								
								}
							?>
				</table>
					<div class="col-sm-7 text-right text-center-xs ">
							<?php include "phantrang_faq.php" ?>
					</div>
			</form>
		</div> <!-- end div faq-->
		</div>
	</body>
</html>