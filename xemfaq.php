<?php
	// session_start();
	include './process/process.php';
?>


<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Danh sách FAQ</title>
		<link rel="stylesheet" href="css/style.css">
		
		<style>
			
			body {
				margin: 10px;
				
				
			}
			
			#faqtable th,td
			{
				padding: 10px;
				
			}
			#frmfaq {
				text-align: right;
				width: 100%;
				
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
		<div id="Header">
        	<h3>XEM DANH SÁCH FAQ</h3>
            <hr />
        </div>
		<div id="newfaq">
			<form id= "frmfaq" name ="frmfaq" method = "post" action="" enctype="multipart/form-data">
				<table border = "1" id="faqtable">
					<tr>
						<th> Tên sự số </th>
						<th> Hình ảnh </th>
						<th> Chi tiết </th>
						<th> Cách khắc phục </th>
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
									<td><img src="<?=$row['hinhanhsuco']?>"></td>
									<td><?=$row['chitiet']?></td>
									<td><?=$row['khacphuc']?></td>
								</tr>
							<?php } }

							else {
								echo "<script> 
									
									alert('Lỗi truy xuất csdl!');
										
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