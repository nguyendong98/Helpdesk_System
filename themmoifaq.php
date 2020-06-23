<?php
	// session_start();
	include './process/process.php';
	if(!isset($_SESSION['id'])){
    echo "<script>
        window.open('login.php', '_self', 1);
    </script>";
  }
	if($_SESSION['role'] != 0 ){
    echo "<script>
      alert('You do not have sufficient permissions to access this page');
      window.open('index.php?content=home', '_self', 1);
    </script>";
  }
?>



<?php
	if(isset($_POST['addfaq'])){
		$tensuco = $_POST['tensuco'];
		$hinhanh = basename($_FILES["hinhanh"]["name"]);
		$hinhanhtmp = $_FILES['hinhanh']["tmp_name"];
		$target_dir = "upload/";
		$target_file = $target_dir.$hinhanh;
		move_uploaded_file($hinhanhtmp, $target_file);
		$chitiet = $_POST['chitiet'];
		$khacphuc = $_POST['khacphuc'];
		$sql = "INSERT INTO faq(tensuco,hinhanhsuco,chitiet,khacphuc) 
		VALUES ('$tensuco','$target_file','$chitiet','$khacphuc');";
		if(mysqli_query($conn,$sql))
		{
			echo "<script> 
			
					alert('Add the new FAQ successfully!');
			
					</script>";
		}
		else 
		{
			echo
					"<script>
						alert('fail!'+'$conn->error');
				</script>";
		}
		
	}



?>
<!DOCTYPE html>

	

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title> Add FAQ </title>
        <link rel="stylesheet" href="css/css/style.css" />

		<style>

		</style>
	</head>

	<body>
		
	<div class="container">
		<div id="Header">
        	<h3 class='text-center my-5'>ADD FAQ</h3>
            <hr />
        </div>
		<div id="newfaq">
			<form id= "frmnewfaq" name ="frmnewfaq" method = "post" action="" enctype="multipart/form-data">
				<table class="table table-striped b-light" id="newfaqtable">
					<tr>
						<th> Trouble name </th>
						<th> Image </th>
						<th> Detail </th>
						<th> How to fix </th>
					</tr>
					<tr>
						<td> <input type = "text" name= "tensuco"> </td>
						<td> <input type = "file" name= "hinhanh"> </td>
						<td> <textarea name= "chitiet" rows ="5"></textarea></td>
						<td> <textarea name= "khacphuc" rows ="5"></textarea> </td>
					</tr>
				</table>
				<input class="btn btn-success" id ="btnsubmit" type="submit" name="addfaq" value="Thêm">
			</form>
		</div>
	</div>

	
	
	
	
	</body>




</html>
