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
		
		<style>
			#Container{
				margin-top: 0px;
			}
		</style>
	</head>
	<body>
		<div id="Container">
		<div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            Danh sách nhân viên kỹ thuật
          </div>
          
          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th>Họ tên</th>
                  <th>Địa chỉ</th>
				  <th>Điện thoại</th>
				  <th>Chuyên môn</th>
				  <th>Phòng ban</th>
				  <th>Giao</th>
                </tr>
              </thead>
              <tbody>
                
                <tr>
                  
                  <td></td>
                  <td></td>
                  
				  <td></td>
				  <td></td>
				  <td></td>
				  
                  <td style="width: 10%">
				  <!-- chuyen qua trang XuLy_PhanCong voi SC_ID va NV_ID-->
                  <a style="font-size: 20px; color: red" href="XuLy_PhanCong.php?SC_ID=<?php echo $_GET['SC_ID']?>&NV_ID=1">
                        <i class="fa fa-hand-pointer-o" aria-hidden="true"></i>
					</a>
					</td>
                </tr>
				
              </tbody>
            </table>
          </div>
          
				</div>
			</div>
	  
		
	    </div>
		
	</body>
</html>
