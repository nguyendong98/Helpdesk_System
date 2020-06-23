<?php
	// session_start();
	include './process/process.php';
?>

<!-- //Xử lí thêm sự cố -->
<?php
	if(isset($_POST['btnDongY'])){
	    $idnv_thongbao = $_SESSION['id'];
		$SC_IDNVTHONGBAO = $idnv_thongbao;
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
		'$SC_IDPHANCUNG', '$SC_MOTACHITIET', '$hinhanh', 'Chưa xử lí')");
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
<title>Report the trouble</title>
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
		background: whitesmoke;
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
		background: whitesmoke;
		box-shadow: 2px 2px 10px -1px rgba(0,0,0,0.75);
		
	}
	
	#Content #tbThongBaoSuCo{
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
		color: gray;
	}
	
	#Footer p{
		text-align:center;
	}


	.title{
		font-size: 1.5rem;
	}

</style>

</head>

<body>
	<div style="background: #EEF9F0;">
    	<div id="Header">
		PROVIDING TROUBLE INFORMATION
        </div>
        <div id="Content" class="pb-4">
        	<form id="frmBaoSuCo" name="frmBaoSuCo" method="post" action="" enctype="multipart/form-data">
            	<table id="tbThongBaoSuCo">
                	<tr>
                    	<td>
                        	<table id="tbNVThongBao">
                    			<tr>
                        			<th colspan="2" class="title text-secondary">Notification officer</th>
                        		</tr>
                        
                        		<tr>
                        			<td>Name of employee</td>
                            		<td class="rightTable">
                            			<select id="slTenNhanVien_ThongBao" name="slTenNhanVien_ThongBao" class="form-control" id="exampleFormControlSelect1" disabled >
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
                        			<th colspan="2" class="title text-secondary">The troubles content</th>
                        		</tr>
								<tr>
									<td>
										Hardware
									</td>
									<td class="rightTable">
										<select id="phancung" name="phancung" class="form-control" id="exampleFormControlSelect1" required>
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
									The time of the trouble</td>
                            		<td class="rightTable">
                                		<input type="date" class="form-control w-100" name="txtThoiDiem"/>
                            		</td>
                        		</tr>
                        
                        		<tr>
                        			<td>Location of the trouble</td>
                            
                            		<td class="rightTable">
                            			<input type="text" class="form-control w-100" name="txtDiaDiem" required/>
                            		</td>
                        		</tr>
                        
                        		<tr>
                        			<td height="90px">Detailed description</td>
                            
                            		<td class="rightTable"><textarea class="form-control" id="txtChiTiet" name="txtChiTiet" rows="5" required></textarea></td>
                        		</tr>
                 			</table>
                        </td>
                        
                        <td>
                        	<table id="tbNVGapSuCo">
                    			<tr>
                        			<th colspan="2" class="title text-secondary">Staff had a trouble</th>
                        		</tr>
                        
                        		<tr>
                        			<td>Name of employee</td>
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
                        			<th colspan="2" class="title text-secondary">Photos of the trouble</th>
                        		</tr>
                        
                        		<tr>
                        			<td>
                            			URL</td>
                            		<td class="rightTable">
                                		<input type="file" class="w-100" id="txtDuongDan" name="hinhanh"/>
                            		</td>
                        		</tr>
                        
                        		<tr>
									<td class="rightTable" colspan="2" height="150px">
                                        <div class="d-flex justify-content-center mb-4">
                                            <input class="btn btn-success w-25 py-3" type="submit" id="btnDongY" name="btnDongY" value="Đồng ý" style="color: whitesmoke"/>
                                        </div>
                                    </td>                        			
                        		</tr>
                        
                        		
                           </table>
                        </td>
                        
                        
                    </tr>
				</table>

			</form>
        </div>
        
        <div id="Footer" >
        	<hr />
            <p class="text-secondary">Can Tho university</p>
        </div>
	</div>
	
</body>
</html>
