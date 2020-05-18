<!DOCTYPE html>
<?php 
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


<html>

<head>

  <link rel="stylesheet" href="css/css/style.css" />



</head>

<body>
    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
          Theo dõi tiến độ hoàn thành sự cố
        </div>

        <div class="table-responsive">
          <table class="table table-striped b-light" >
            <thead>
              <tr>
                <th>#</th>
                
                <th>KTV được phân công</th>
                <th>Thời điểm ghi nhận</th>
                <th>Phần cứng</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
               
              </tr>
            </thead>
            <tbody>
              <?php
                $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:2; //số item trên 1 trang
                $current= !empty($_GET['page'])?$_GET['page']:1;    // trang hiện tại
                $offset = ($current - 1) * $item_per_page;      // item bắt đầu của mỗi trang

                $sql = "SELECT nhanvien.NV_HOTEN, suco.SC_ID, suco.SC_THOIDIEMGAP,suco.SC_THOIDIEMGHINHAN, suco.SC_DIADIEM, suco.SC_MOTACHITIET, suco.SC_ANHMANHINH, phancung.PC_TEN, suco.SC_IDTRANGTHAI from nhanvien, nhiemvuphancong, suco, phancung WHERE NVPC_IDNHANVIEN=NV_ID and  NVPC_IDSUCO=SC_ID and suco.SC_IDPHANCUNG=phancung.PC_ID order by suco.SC_ID desc limit ".$item_per_page." offset ".$offset." ";

                $total_item = mysqli_query($conn, "SELECT nhanvien.NV_HOTEN, suco.SC_ID, suco.SC_THOIDIEMGAP,suco.SC_THOIDIEMGHINHAN, suco.SC_DIADIEM, suco.SC_MOTACHITIET, suco.SC_ANHMANHINH, phancung.PC_TEN, suco.SC_IDTRANGTHAI from nhanvien, nhiemvuphancong, suco, phancung WHERE NVPC_IDNHANVIEN=NV_ID and  NVPC_IDSUCO=SC_ID and suco.SC_IDPHANCUNG=phancung.PC_ID ");
                $total_item = $total_item->num_rows;  // tổng số item
                $result=mysqli_query($conn, $sql);
                $total_page= ceil($total_item/$item_per_page); //tổng số trang
                if(mysqli_num_rows($result) > 0){

                  while($row = mysqli_fetch_assoc($result)){
              ?>
              <tr>
                <td><?=$offset+1?></td>
                <td><?=$row['NV_HOTEN']?></td>
                <td><?=$row['SC_THOIDIEMGHINHAN']?></td>
                <td><?=$row['PC_TEN']?></td>
                <td><?=$row['SC_MOTACHITIET']?></td>
                <td><img src="upload/<?=$row['SC_ANHMANHINH']?>" alt="" style="width: 80px; height:50px"></td>
                <td><b>  <?=$row['SC_IDTRANGTHAI']?> </b> </td>

               
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
              <?php include 'Phantrang_Ketqua.php' ?>
            </div>
          </div>
        </footer>
      </div>
    </div>
</body>

</html>
