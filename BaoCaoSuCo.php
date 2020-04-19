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

	#Header h2{
		text-align:center;	
	}
	
	#Content{
		margin:auto;
		height: 500px;
	}
	
	#Content #tbThongBaoSuCo{
		border-top: 1px solid #666;
		border-bottom: 1px solid #666;
		border-left: 0px;
		border-right: 1px solid #666;
		margin:auto;
		width: 1000px;
		height: 450px;
		text-align:center;
	}
	
	#Content #tbThongBaoSuCo td{
		text-align:center;
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
		width: 180px;
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
    	<div id="Header">
        	<h2>Cung Cấp Thông Tin Sự Cố</h2>
            <hr />
        </div>
        
        <div id="Content">
        	<form id="frmBaoSuCo" name="frmBaoSuCo" method="post" action="" enctype="multipart/form-data">
            	<table id="tbThongBaoSuCo">
                	<tr>
                    	<td>
                        	<table id="tbNVThongBao">
                    			<tr>
									

                        			<th colspan="2">Nhân viên thông báo</th>
                        		</tr>
                        
                        		<tr>
                        			<td>Tên nhân viên</td>
                            		<td class="rightTable">
                            			<select id="slTenNhanVien_ThongBao" name="slTenNhanVien_ThongBao" >
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
                        			<th colspan="2">Nội dung sự cố</th>
                        		</tr>
								<tr>
									<td>
										Phần cứng
									</td>
									<td class="rightTable">
										<select id="phancung" name="phancung">
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
                                		<input type="date" id="txtThoiDiem" name="txtThoiDiem"/>
                            		</td>
                        		</tr>
                        
                        		<tr>
                        			<td>Địa điểm gặp sự cố</td>
                            
                            		<td class="rightTable">
                            			<input type="text" id="txtDiaDiem" name="txtDiaDiem"/>
                            		</td>
                        		</tr>
                        
                        		<tr>
                        			<td height="90px">Mô tả chi tiết</td>
                            
                            		<td class="rightTable"><textarea id="txtChiTiet" name="txtChiTiet" rows="5"></textarea></td>
                        		</tr>
                 			</table>
                        </td>
                        
                        <td>
                        	<table id="tbNVGapSuCo">
                    			<tr>
                        			<th colspan="2">Nhân viên gặp sự cố</th>
                        		</tr>
                        
                        		<tr>
                        			<td>Tên nhân viên</td>
                            		<td class="rightTable">
                            			<select id="slTenNhanVien_GapSuCo" name="slTenNhanVien_GapSuCo">
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
                        			<th colspan="2">Hình ảnh sự cố</th>
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
                                        <img src="" height="150px" width="350px"/>
                                    </td>                        			
                        		</tr>
                        
                        		
                           </table>
                        </td>
                        
                        <tr>
                        	<td colspan="2" align="right">
                            	<input class="Button" type="submit" id="btnDongY" name="btnDongY" value="Đồng ý"/>
                            </td>
                        </tr>
                    </tr>
                	
                </table>
                
                
            </form>
        </div>
        
        <div id="Footer">
        	<hr />
            <p>Đại Học Cần Thơ</p>
        </div>
	</div>
	
</body>
</html>
