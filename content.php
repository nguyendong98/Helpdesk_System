<?php
    if(isset($_GET['content'])){
        switch($_GET['content']){
            case "baocaosuco":
                include ("BaoCaoSuCo.php");
                break;
            case "tracuuloi":
                include("tracuuloi.php");
                break;    
            case "home":
                include ("Home.php");    
                break;
			case "danhsachsuco":
				include ("DanhSachSuCo.php");
				break;
			case "phancongsuco":
				include ("PhanCongSuCo.php");
				break;
            case "thongtinphancung":
				include ("thongtinphancung.php");
				break;
			case "sucomoi":
				include ("sucomoi.php");
				break;
			case "Ketqua":
				include ("Ketqua.php");
				break;
			case "themmoifaq":
				include ("themmoifaq.php");
				break;
			case "xemfaq":
				include ("xemfaq.php");
				break;
			case "suafaq":
				include ("suafaq.php");
				break;
			case "formsuafaq":
				include("formsuafaq.php");
				
        }
    }else{
		include 'Home.php';
	}

?>
