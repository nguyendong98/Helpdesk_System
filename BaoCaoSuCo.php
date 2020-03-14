<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Báo cáo sự cố</title>

<style>

	#Header h2{
		text-align:center;	
	}
	
	#Header hr{	
	}
	#Content{
		margin:auto;
		height: 450px;
	}
	
	#Content #tbThongBaoSuCo{
		border: 1px solid #666;
		margin:auto;
		border-spacing: 25px;
	}
	
	#Content #tbNVThongBao{
		float: left;
		height: 330px;
		width: 400px;
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
		width:370px;
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
</style>

</head>

<body>
	<div id="Container">
    	<div id="Header">
        	<h2>Cung Cấp Thông Tin Sự Cố</h2>
            <hr />
        </div>
        
        <div id="Content">
        	<form id="frmBaoSuCo" name="frmBaoSuCo" method="post" action="">
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
                            			<select id="slTenNhanVien_ThongBao">
                            				<option value="1">Nguyễn Văn A</option>
                            			</select>
                            		</td>
                        		</tr>
                        
                        		<tr>
                        			<th colspan="2">Nội dung sự cố</th>
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
                            			<select id="slTenNhanVien_ThongBao">
                            				<option value="1">Nguyễn Văn A</option>
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
                                		<input type="file" id="txtDuongDan" name="txtDuongDan"/>
                            		</td>
                        		</tr>
                        
                        		<tr>
									<td class="rightTable" colspan="2" height="150px">
                                        <img src="" height="150px" width="370"/>
                                    </td>                        			
                        		</tr>
                        
                        		
                           </table>
                        </td>
                        
                        <tr>
                        	<td colspan="2" align="right">
                            	<input type="submit" id="btnDongY" name="btnDongY" value="Đồng ý"/>
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