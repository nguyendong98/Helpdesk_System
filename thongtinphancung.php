<?php
	// session_start();
	include './process/process.php';
?>

<!-- //Xử lí hiển thị chi tiết sự cố -->
<?php
	
	

?>



<!DOCTYPE html>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Báo cáo sự cố</title>
<link rel="stylesheet" href="css/style.css">
<style>


	
	#Content{
		margin: 1rem 1rem;
		height: 500px;
		background: whitesmoke;
		box-shadow: 2px 2px 10px -1px rgba(0,0,0,0.75);
		
	}
	
	#Content #tbThongBaoSuCo{
		/* border-top: 1px solid #666;
		border-bottom: 1px solid #666;
		border-left: 0px;
		border-right: 1px solid #666; */
		margin:auto;
		width: 1000px;
		height: 450px;
		text-align: right;
		
	}
	
	#Content #tbThongBaoSuCo td{
		text-align:right;
		border-spacing: 30px;
		
	}
	
	#Content #tbNVThongBao{
		float: left;
		height: 330px;
		width: 500px;
	}
	
	#Content #tbNVThongBao th{	
		text-align:left;	
		
	}
	
	#Content #tbNVThongBao td{
		text-align: center;	
	}
	
	#Content #tbNVGapSuCo{
		float:left;
		height: 330px;
		width:500px;
	}
	
	#Content #tbNVGapSuCo th{	
		text-align:left;	
	}
	
	#Content #tbNVGapSuCo td{
		text-align: center;	
	}
	
	.rightTable input, select, textarea{
		width: 370px;
		border-radius: px;
		box-shadow: 4px 6px 14px -8px rgba(0,0,0,0.75);
		color: gray;
	}
	
	#Footer p{
		text-align:center;
	}

	.Button{
		background: #0776BE;
		height: 30px;
		width: 100px;	
		font-weight:bold;
		color:#FFF;	
	}

</style>

</head>

<body>
	<div id="Container">

        	<h4 class="text-center  pt-3" style="font-weight: 700">THÔNG TIN PHẦN CỨNG</h4>
            <hr />

        
        <div id="Content">
        	<form id="frmBaoSuCo" name="frmBaoSuCo" method="post" action="" enctype="multipart/form-data">
            	<table id="tbThongBaoSuCo">
                	<tr>
                    	<td>
                        	<table id="tbNVThongBao" >
                        
                        		<tr>
                        			<td class="text-left"> Tên nhân viên</td>
                            		<td class="rightTable ">
                            			<select id="slTenNhanVien_ThongBao" name="slTenNhanVien_ThongBao" class="form-control">
											
											
											
											
											<?php
												if(isset($_SESSION['id'])){													
													// print_r($id);
													$sql=mysqli_query($conn, "SELECT * FROM nhanvien" );
													while($result= mysqli_fetch_array($sql)){
													
											?>
											<option value="<?=$result['NV_ID']?>"><?=$result['NV_HOTEN']?></option>
											<?php }} ?>
											
											
											
											
                            			</select>
                            		</td>
                        		</tr>
								<tr>
                        			<td class="text-left">Danh sách phần cứng</td>
                            		<td class="rightTable">
                            			<select id="slTenNhanVien_GapSuCo" name="slTenNhanVien_GapSuCo" class="form-control">
											<?php
												if(isset($_SESSION['id'])){													
													// print_r($id);
													$sql=mysqli_query($conn, "SELECT * FROM phancung" );
													while($result= mysqli_fetch_array($sql)){
													
											?>
											<option value="<?=$result['PC_ID']?>"><?=$result['PC_TEN']?></option>
											<?php }} ?>
                            			</select>
                            		</td>
                        		</tr>
                        
						<td style="text-align: right">
                            <input class="btn btn-success" type="submit" id="btnDongY" name="btnDongY" value="Tìm kiếm"/>
                            </td>
								
								
								
								
                        		<tr>
                        			<th colspan="2" class="title">Thông tin chi tiết</th>
                        		</tr>
								<tr>
							

									 <table class="table table-striped b-light">
								  <tr>
									 <td>STT</td>
									 <td>Tên nhân viên</td>
									<td>Mã số PC</td>
									<td>Tên phần cứng</td>
									<td>Ngày mua</td>
									<td>Chủng loại</td>
									<td>Mô tả chi tiết</td>
									
								  </tr>
									
						
								<?php
								if(isset($_POST['btnDongY'])){
										$SC_IDNVGAPSUCO = $_POST['slTenNhanVien_GapSuCo'];
										$SC_IDNVTHONGBAO = $_POST['slTenNhanVien_ThongBao'];
												if(isset($_SESSION['id'])){													
													// print_r($id);
													$sql=mysqli_query($conn, "SELECT * from phancung, suco, nhanvien where PC_ID=SC_IDPHANCUNG and PC_IDNHANVIEN='$SC_IDNVTHONGBAO' and PC_ID='$SC_IDNVGAPSUCO' and PC_IDNHANVIEN=NV_ID" );
													$i=1;
													while($dong= mysqli_fetch_array($sql)){
													
															?>

								 <tr>
									
									<td><?php  echo $i;?></td>
									<td><?php echo $dong['NV_HOTEN'] ?></td>
									<td><?php echo $dong['PC_ID'] ?></td>
									<td><?php echo $dong['PC_TEN'] ?></td>
									<td><?php echo $dong['PC_NGAYMUA'] ?></td>
									<td><?php echo $dong['PC_IDLOAIPHANCUNG'] ?></td>
									<td><?php echo $dong['SC_MOTACHITIET'] ?></td>
									
											   
									</tr>
						  
														  <?php
								 $i++;
								}}} ?>
														  
						  
						  
						  
						  
	   

    

</table>
						  
						  
						  
						  
						  
						  
						  
                 			</table>
                        </td>
                        

                        
                       
                    </tr>
                </table>
            </form>
        </div>
        
        <div id="Footer" >
        	<hr />
            <p class="text-secondary">Đại Học Cần Thơ</p>
        </div>
	</div>
	
</body>
</html>
