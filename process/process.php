<?php 
    $conn = new mysqli("localhost", "root", "", "helpdesk_system") or die("Kết nối thất bại");
    mysqli_query($conn, "SET NAMES UTF8");
?>