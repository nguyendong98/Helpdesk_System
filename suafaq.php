<?php
	// session_start();
	include './process/process.php';
	if(!isset($_SESSION['id'])){
    echo "<script>
        window.open('login.php', '_self', 1);
    </script>";
	}
	if($_SESSION['role'] != 0 ){
    echo "<script>
      alert('Bạn không đủ quyền hạn để vào trang này');
      window.open('index.php?content=home', '_self', 1);
    </script>";
	}
?>

<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Cập nhật FAQ</title>
		<link rel="stylesheet" href="css/style.css">
		<style>
			body{
				background: whitesmoke;
			}
			#frmupfaq 
			{
				width: 100%;
				text-align: center;
				width: 100%;
				background: #eef9f0;
				box-shadow: 2px 2px 10px -1px rgba(0,0,0,0.75);
				padding-bottom: 1rem;
			}
			
			#upfaqtable{
				
				
				width: 100%;
			}
			
			#frmupfaq img 
			{
				width: 150px;
				height: 150px;
				
				
			}
			#upfaqtable th, td {
				
				
				padding: 10px;
			}
				
			#Header {
				
				padding-top: 5px;
				
				
			}
				
		
		
		
		</style>
		
	</head>
	
	<body>
        <div id="Header" style="text-align: center; background: #ddede0; padding: 16px;">
        	<div style="font-size: 20px; font-weight: bold">CẬP NHẬT DANH SÁCH FAQ</div>
        </div>
		<div id="upfaq">
			<form id= "frmupfaq" name ="frmupfaq" method = "post" action="" enctype="multipart/form-data">
				<table class="table table-striped w-100">
					<tr>
						<th> Id FAQ</th>
						<th> Tên sự số </th>
						<th> Hình ảnh </th>
						<th> Chi tiết </th>
						<th> Cách khắc phục </th>
						<th> Tùy chọn</th>
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
						//$sql = "SELECT * FROM faq ORDER BY idfaq DESC";
						$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_assoc($result)){
					?>
								<tr>
									<td><?=$row['idfaq']?></td>
									<td><?=$row['tensuco']?></td>
									<td><img style="width: 50px; height: 50px" src="<?=$row['hinhanhsuco']?>"></td>
									<td><?=$row['chitiet']?></td>
									<td><?=$row['khacphuc']?></td>
									<td> <a href= "index.php?content=formsuafaq&id_faq=<?=$row['idfaq']?>" style="padding-right: 2rem">
											<i class="fa fa-pencil-square-o text-success text-active"></i>
										</a>
										<a href= "#">
											<i class="fa fa-trash-o text-danger" aria-hidden="true"></i>
										</a>
									</td>
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
							<?php include "phantrang_suafaq.php" ?>
					</div>
				
			</form>
		</div> <!-- end div faq-->
		
		
		
	
	
	</body>
	
	



</html>