<?php
	// session_start();
	include './process/process.php';
?>

<!-- //Xử lí thêm sự cố -->
<?php
	if(isset($_POST['btnDongY'])){
		$SC_IDNVTHONGBAO = $_POST['slTenNhanVien_ThongBao'];
		$SC_IDNVGAPSUCO = $_POST['slTenNhanVien_GapSuCo'];
		$SC_THOIDIEMGAP = $_POST['txtThoiDiem'];
		$SC_DIADIEM = $_POST['txtDiaDiem'];
		$SC_IDPHANCUNG = $_POST['phancung'];
		$SC_MOTACHITIET = $_POST['txtChiTiet'];
		$hinhanh=$_FILES['hinhanh']['name'];
		$hinhanhtmpname=$_FILES['hinhanh']['tmp_name'];
		$folder='./upload/';
		move_uploaded_file($hinhanhtmpname, $folder.$hinhanh);
		$sql = mysqli_query($conn, "INSERT INTO suco(SC_IDNVTHONGBAO, SC_IDNVGAPSUCO, SC_THOIDIEMGAP, 
		SC_DIADIEM, SC_IDPHANCUNG, SC_MOTACHITIET, SC_ANHMANHINH, SC_IDTRANGTHAI) 
		VALUES('$SC_IDNVTHONGBAO', '$SC_IDNVGAPSUCO', '$SC_THOIDIEMGAP', '$SC_DIADIEM',
		'$SC_IDPHANCUNG', '$SC_MOTACHITIET', '$hinhanh', 'Chưa xủ lí')");
		if($sql){
			echo "<script>
                 alert('Thêm thành công');   
            </script>";
		}
	}



?>
<!DOCTYPE html>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Báo cáo sự cố</title>
<link rel="stylesheet" href="css/style.css">
<style>
	#Header{
		position: relative;
		height: 57px;
		line-height: 57px;
		letter-spacing: 0.2px;
		color: #000;
		font-size: 18px;
		font-weight: bold;
		padding: 0 16px;
		background: #ddede0;
		border-top-right-radius: 2px;
		border-top-left-radius: 2px;
		text-transform: uppercase;
		text-align: center;

	}
	/* #Header h3{
		font-size: 2rem;
		font-weight: bold;
		margin-left: 1rem;
		text-shadow: 1px 1px 2px gray;
	} */
	
	#Content{
		margin: 1rem 1rem;
		background: #EEF9F0;
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
		
	}
	
	#Content #tbThongBaoSuCo td{
		border-spacing: 30px;
		
	}
	#tbThongBaoSuCo td{
		text-align: left;
		padding: 0 1rem;
	}
	
	#Content #tbNVThongBao{
		float: left;
		height: 330px;
		width: 500px;
	}
	
	#Content #tbNVThongBao th{	
		text-align:left;	
		
	}
	
	#Content #tbNVGapSuCo{
		float:left;
		height: 330px;
		width:500px;
	}
	
	#Content #tbNVGapSuCo th{	
		text-align:left;	
	}
	
	.rightTable input, select, textarea{
		width: 180px;
		border-radius: px;
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
	.title{
		font-size: 1.5rem;
	}

</style>

</head>

<body>
	<div style="background: #EEF9F0;">
    	<div id="Header">
        	CUNG CẤP THÔNG TIN SỰ CỐ
        </div>
        <div id="Content" class="pb-4">
        	<form id="frmBaoSuCo" name="frmBaoSuCo" method="post" action="" enctype="multipart/form-data">
            	<table id="tbThongBaoSuCo">
                	<tr>
                    	<td>
                        	<table id="tbNVThongBao">
                    			<tr>
                        			<th colspan="2" class="title text-secondary">Nhân viên thông báo</th>
                        		</tr>
                        
                        		<tr>
                        			<td>Tên nhân viên</td>
                            		<td class="rightTable">
                            			<select id="slTenNhanVien_ThongBao" name="slTenNhanVien_ThongBao" class="form-control" id="exampleFormControlSelect1" >
											<?php
												if(isset($_SESSION['id'])){
													$id = $_SESSION['id'];
													// print_r($id);
													$sql=mysqli_query($conn, "SELECT * FROM nhanvien WHERE NV_IDTAIKHOAN='$id'");
													$result=mysqli_fetch_array($sql);
												
											?>
											<option value="<?=$result['NV_ID']?>"><?=$result['NV_HOTEN']?></option>
											<?php } ?>
                            			</select>
                            		</td>
                        		</tr>
                        
                        		<tr>
                        			<th colspan="2" class="title text-secondary">Nội dung sự cố</th>
                        		</tr>
								<tr>
									<td>
										Phần cứng
									</td>
									<td class="rightTable">
										<select id="phancung" name="phancung" class="form-control" id="exampleFormControlSelect1">
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
                        		<tr>

                        			<td> 
                            			Thời điểm gặp sự cố</td>
                            		<td class="rightTable">
                                		<input type="date" class="form-control" name="txtThoiDiem"/>
                            		</td>
                        		</tr>
                        
                        		<tr>
                        			<td>Địa điểm gặp sự cố</td>
                            
                            		<td class="rightTable">
                            			<input type="text" class="form-control" name="txtDiaDiem"/>
                            		</td>
                        		</tr>
                        
                        		<tr>
                        			<td height="90px">Mô tả chi tiết</td>
                            
                            		<td class="rightTable"><textarea class="form-control" id="txtChiTiet" name="txtChiTiet" rows="5"></textarea></td>
                        		</tr>
                 			</table>
                        </td>
                        
                        <td>
                        	<table id="tbNVGapSuCo">
                    			<tr>
                        			<th colspan="2" class="title text-secondary">Nhân viên gặp sự cố</th>
                        		</tr>
                        
                        		<tr>
                        			<td>Tên nhân viên</td>
                            		<td class="rightTable">
                            			<select id="slTenNhanVien_GapSuCo" name="slTenNhanVien_GapSuCo" class="form-control" id="exampleFormControlSelect1">
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
                        			<th colspan="2" class="title text-secondary">Hình ảnh sự cố</th>
                        		</tr>
                        
                        		<tr>
                        			<td>
                            			Đường dẫn</td>
                            		<td class="rightTable">
                                		<input type="file" id="txtDuongDan" name="hinhanh"/>
                            		</td>
                        		</tr>
                        
                        		<tr>
									<td class="rightTable" colspan="2" height="150px">
                                    </td>                        			
                        		</tr>
                        
                        		
                           </table>
                        </td>
                        
                        
                    </tr>
				</table>
				<div class="d-flex justify-content-center mb-4">
					<input class="btn btn-success w-25 py-3" type="submit" id="btnDongY" name="btnDongY" value="Đồng ý"/>
				</div>
			</form>
        </div>
        
        <div id="Footer" >
        	<hr />
            <p class="text-secondary">Đại Học Cần Thơ</p>
        </div>
	</div>
	
</body>
</html>
