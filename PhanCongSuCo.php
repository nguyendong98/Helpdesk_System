<?php
	if(isset($_GET['SC_ID'])){
		if(isset($_POST['submit'])){
			$id_sc = $_GET['SC_ID'];
			$id_nv = $_POST['nv_id'];
			print_r($id_nv);
			print_r($id_sc);
			$sql = mysqli_query($conn, "INSERT INTO nhiemvuphancong(NVPC_IDSUCO, NVPC_IDNHANVIEN) 
			VALUES ('$id_sc', '$id_nv')");
			if($sql){
				$sql1 = mysqli_query($conn, "UPDATE suco SET SC_IDTRANGTHAI = 'Đang xử lí' WHERE SC_ID = '$id_sc' ");
				echo "<script language='javascript'>
							alert('Phân công thành công');
							window.open('index.php?content=danhsachsuco', '_self' , 1);
					</script>";
			}
		}
	}
?>


<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" href="css/css/font.css"/>
		<link rel="stylesheet" href="css/css/font-awesome.css"/>
		<link rel="stylesheet" href="css/css/style.css"/>
		<link rel="stylesheet" href="css/css/style-responsive.css"/>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
		<!-- <style>
			#Container{
				margin-top: 0px;
			
		</style> -->
	</head>
	<body>
		<div id="Container">
		<div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            Phân công nhiệm vụ
          </div>
          <form action="" method='POST'>
          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th>Mã sự cố</th>
                  <th>Mô tả</th>
				  <th>Thời điểm</th>
				  <th>Hình ảnh</th>
				  
				  <th>Đảm nhận</th>
				  
                </tr>
              </thead>
              <tbody>
				<?php
					if(isset($_GET['SC_ID'])){
						$sc_id = $_GET['SC_ID'];
						$sql = mysqli_query($conn, "SELECT * FROM suco WHERE SC_ID = '$sc_id' ");
						$result = mysqli_fetch_assoc($sql);
						
					
				?>
                <tr>
                  
                  <td><?=$result['SC_ID']?></td>
                  <td><?=$result['SC_MOTACHITIET']?></td>
                  <td><?=$result['SC_THOIDIEMGAP']?></td>
				  <td><img src="upload/<?=$result['SC_ANHMANHINH']?>" alt="" style="width: 80px; height: 50px"></td>
				  
				  <td>
						<select name="nv_id" id="">
							<?php 
								$sql1 = mysqli_query($conn, "SELECT nhanvien.NV_HOTEN, nhanvien.NV_ID FROM nhanvien, taikhoan 
								WHERE taikhoan.TK_ROLE = '1' AND taikhoan.TK_ID = nhanvien.NV_IDTAIKHOAN");
								while($row = mysqli_fetch_assoc($sql1)){
							?>
							<option value="<?=$row['NV_ID']?>"><?=$row['NV_HOTEN']?></option>
							<?php } ?>
						</select>
				  
				  </td>
				  
                  
                </tr>
				<?php } ?>
              </tbody>
            </table>
			<div class="d-flex justify-content-center">
			<a class="btn btn-primary mr-1" href="index.php?content=danhsachsuco">Trở về</a>
			<button class="btn btn-success ml-1" name="submit">Xác nhận</button>
			</div>
          </div>
		  </form>
          
				</div>
			</div>
	  
		
	    </div>
		
	</body>
</html>
 