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
  <link rel="stylesheet" href="css/css/font.css" />
  <link rel="stylesheet" href="css/css/font-awesome.css" />
  <link rel="stylesheet" href="css/css/style.css" />
  <link rel="stylesheet" href="css/css/style-responsive.css" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    #Container {
      margin-top: 0px;
    }
  </style>
</head>

<body>
  <div id="Container">
    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
          Danh sách sự cố chưa phân công
        </div>

        <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th>#</th>
                
                <th>NV Gặp sự cố</th>
                <th>Thời điểm</th>
                <th>Phần cứng</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Phân công</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql = mysqli_query($conn, "select nhanvien.NV_HOTEN,suco.SC_ID, suco.SC_THOIDIEMGAP, suco.SC_THOIDIEMGHINHAN, 
                suco.SC_MOTACHITIET, suco.SC_ANHMANHINH, suco.SC_IDTRANGTHAI, suco.SC_DIADIEM, phancung.PC_TEN 
                FROM nhanvien, suco, phancung 
                WHERE nhanvien.NV_ID = suco.SC_IDNVGAPSUCO AND suco.SC_IDPHANCUNG=phancung.PC_ID AND suco.SC_IDTRANGTHAI='Chưa xử lí' ");
                if(mysqli_num_rows($sql) > 0){
                  while($row = mysqli_fetch_assoc($sql)){
                    $i  = 1;
              ?>
              <tr>
                <td><?=$i?></td>  
                <td><?=$row['NV_HOTEN']?></td>
                

                <td><?=$row['SC_THOIDIEMGAP']?></td>
                <td><?=$row['PC_TEN']?></td>
                <td><?=$row['SC_MOTACHITIET']?></td>
                <td><img src="upload/<?=$row['SC_ANHMANHINH']?>" alt="" style="width: 80px; height:50px"></td>
                <td><?=$row['SC_IDTRANGTHAI']?></td>

                <td style="width: 10%">
                  <a style="font-size: 20px" href="index.php?content=phancongsuco&SC_ID=<?=$row['SC_ID']?>">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                </td>
              </tr>
                  <?php } } ?>      

            </tbody>
          </table>
        </div>
        <footer class="panel-footer">
          <div class="row">

            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm"></small>
            </div>

            <div class="col-sm-7 text-right text-center-xs">
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
              </ul>
            </div>
          </div>
        </footer>
      </div>
    </div>


  </div>

</body>

</html>