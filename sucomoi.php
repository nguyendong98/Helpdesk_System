<!DOCTYPE html>
<?php 
	if(!isset($_SESSION['id'])){
    echo "<script>
        window.open('login.php', '_self', 1);
    </script>";
  }
	if($_SESSION['role'] != 1 ){
    echo "<script>
      alert('You are not a technician');
      window.open('index.php?content=home', '_self', 1);
    </script>";
  }
?>

<?php 
	if(isset($_GET['SC_ID'])){
		$id_sc = $_GET['SC_ID'];
		
		$sql = mysqli_query($conn, "UPDATE suco SET SC_IDTRANGTHAI = 'Đã xử lí' WHERE SC_ID = '$id_sc'");
		
		if ($sql){
			echo "
			<script language='javascript'>
				alert('Update successful');
				window.open('index.php?content=sucomoi', '_self' , 1);
			</script>";
		}
	}
		
?>
<html>

<head>

  <link rel="stylesheet" href="css/css/style.css" />



</head>

<body>
    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
        List of new trouble
        </div>

        <div class="table-responsive">
          <table class="table table-striped b-light" >
            <thead>
              <tr>
                <th>#</th>
                
                <th>Staff had a trouble</th>
                <th>Time</th>
                <th>Hardware</th>
                <th>Description</th>
                <th>Image</th>
                <th>Status</th>
                <th>Finish</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:2; //số item trên 1 trang
                $current= !empty($_GET['page'])?$_GET['page']:1;    // trang hiện tại
                $offset = ($current - 1) * $item_per_page;      // item bắt đầu của mỗi trang
				
                $sql = "select * from suco 
				join nhiemvuphancong on suco.SC_ID = nhiemvuphancong.NVPC_IDSUCO
				join nhanvien on suco.SC_IDNVGAPSUCO = nhanvien.NV_ID
				join phancung on suco.SC_IDPHANCUNG = phancung.PC_ID
				WHERE suco.SC_IDTRANGTHAI='Đang xử lí' AND nhiemvuphancong.NVPC_IDNHANVIEN = ".$_SESSION['id']."
                order by suco.SC_ID desc limit ".$item_per_page." offset ".$offset." ";
				
                $total_item = mysqli_query($conn, 
				"select * from suco 
				join nhiemvuphancong on suco.SC_ID = nhiemvuphancong.NVPC_IDSUCO
				join nhanvien on suco.SC_IDNVGAPSUCO = nhanvien.NV_ID
				join phancung on suco.SC_IDPHANCUNG = phancung.PC_ID
				WHERE suco.SC_IDTRANGTHAI='Đang xử lí' AND nhiemvuphancong.NVPC_IDNHANVIEN = ".$_SESSION['id']."");
				
                $total_item = $total_item->num_rows;  // tổng số item
                $result=mysqli_query($conn, $sql);
                $total_page= ceil($total_item/$item_per_page); //tổng số trang
                if(mysqli_num_rows($result) > 0){

                  while($row = mysqli_fetch_assoc($result)){
              ?>
              <tr>
                <td><?=$offset+1?></td>
                <td><?=$row['NV_HOTEN']?></td>
                <td><?=$row['SC_THOIDIEMGAP']?></td>
                <td><?=$row['PC_TEN']?></td>
                <td><?=$row['SC_MOTACHITIET']?></td>
                <td><img src="upload/<?=$row['SC_ANHMANHINH']?>" alt="" style="width: 80px; height:50px"></td>
                <td><?=$row['SC_IDTRANGTHAI']?></td>

                <td style="width: 12%">
                  <a style="font-size: 20px" href="index.php?content=sucomoi&SC_ID=<?=$row['SC_ID']?>">
                    <i style="color: green" class="fa fa-check" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
                  <?php $offset++; }  } ?>

            </tbody>
          </table>
        </div>
        <footer class="panel-footer mt-3  ">
          <div class="row">

            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm"></small>
            </div>

            <div class="col-sm-7 text-right text-center-xs ">
              <?php include 'phantrang.php' ?>
            </div>
          </div>
        </footer>
      </div>
    </div>
</body>

</html>
