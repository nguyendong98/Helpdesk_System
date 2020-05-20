<?php
	if(isset($_POST["btnsuafaq"]))
		{
			$id = $_POST["idfaq"];
			$tendasua = $_POST["tendasua"];
			$chitietdasua = $_POST["chitietdasua"];
			$khacphucdasua = $_POST["khacphucdasua"];
			$anhcu = $_POST["anhcu"];	
			/*
			echo $tendasua;
			echo $id;
			echo $chitietdasua;
			echo $khacphucdasua;
			echo $anhcu;
			*/
					
			if($hinhanhmoi = basename($_FILES["anhmoi"]["name"])){
				unlink($anhcu);
				$hinhanhmoitmp = $_FILES['anhmoi']['tmp_name'];
				$target_dir = "upload/";
				$target_file = $target_dir.$hinhanhmoi;
				move_uploaded_file($hinhanhmoitmp,$target_file);		
				$sql="UPDATE faq 
					SET tensuco = '$tendasua', 
					hinhanhsuco = '$target_file',
					chitiet ='$chitietdasua',
					khacphuc = '$khacphucdasua'
					WHERE idfaq = '$id';";
					
					if(mysqli_query($conn, $sql))
					{
						echo "<script>  
						
							alert('Success!');
						
						</script>";
					}
					else 
					{
						echo "<script>  
						
							alert('Sửa không thành công!');
						
						</script>";
					}
					
			}
			else {
					$sql = "UPDATE faq 
					SET tensuco = '$tendasua', 
					chitiet ='$chitietdasua',
					khacphuc = '$khacphucdasua'
					WHERE idfaq = '$id';";
					
					if(mysqli_query($conn, $sql))
					{
						echo "<script>  
						
							alert('Success!');
						
						</script>";
					}
					else 
					{
						echo "<script>  
						
							alert('Sửa không thành công!');
						
						</script>";
					}
					
				
			}
		
		}
	


?>


<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Sửa FAQ</title>
		<link rel="stylesheet" href="css/style.css">
		<style>
			#frmupfaq 
			{
				width: 100%;
				text-align: center;
				
			}
			
			#upfaqtable{
				
				text-align: left;
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
				
				
				
		
		
		
		</style>
		
	</head>
	
	<body>
		<div id="upfaq">
			<form id= "frmupfaq" name ="frmupfaq" method = "post" action="" enctype="multipart/form-data">
				<table border = "1" id="upfaqtable">
					<tr>
						<th> Id FAQ</th>
						<th> Tên sự số </th>
						<th> Hình ảnh </th>
						<th> Chi tiết </th>
						<th> Cách khắc phục </th>
					</tr>
					<?php
						if($_GET["id_faq"])
						$id = $_GET["id_faq"];
						$sql = "SELECT * FROM faq WHERE idfaq = '$id'";
						$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_assoc($result)){
					?>
								<tr>
									<td><?=$id?>
										<input type = "text" name = "idfaq" value = "<?=$id?>" style = "display:none;">
									</td>
									<td><input type ="text" name= "tendasua" value="<?=$row['tensuco']?>"></td>
									<td><img src="<?=$row['hinhanhsuco']?>">
										<input type ="text" name= "anhcu" value="<?=$row['hinhanhsuco']?>" style = "display: none;">
										<input type = "file" name = "anhmoi">
									</td>
									<td><textarea name= "chitietdasua"> <?=$row['chitiet']?></textarea></td>
									<td><textarea type ="text" name= "khacphucdasua"><?=$row['khacphuc']?></textarea></td>	
								</tr>
						<?php } }

							else {
								echo "<script> 
									
									alert('Lỗi truy xuất csdl!');
										
								</script>";
								
								}
							?>
					
				</table>
				 <a  href="index.php?content=suafaq">Trở về</a> <input type ="submit" name = "btnsuafaq" value = "Cập nhật FAQ">
				
			</form>
		</div> <!-- end div faq-->
		
		
		
	
	
	</body>
	
	



</html>