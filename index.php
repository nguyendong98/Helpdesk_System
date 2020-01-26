<?php
  session_start();
  include "./process/process.php"

?>
<!-- set up session  -->
<?php
  if(!isset($_SESSION['id'])){
    echo "<script>
        window.open('login.php', '_self', 1);
    </script>";
  }// điều hướng về login.php khi chưa đăng nhập 
  
  if(isset($_POST['logout'])){
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    echo "<script>
        alert('Thoát thành công');
        window.open('login.php', '_self', 1);
    </script>";
  }
?> <!--xử lí phần thoát đăng nhập--> 


<!doctype html>
<html lang="en">
  <head>
    <title>Helpdesk System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--font-awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  </head>
  <body>
     
          <!-- Phần header  -->
         
        <div class="wrapper">
          <header class="header">
            <div class="header-logo" data-aos="fade-right" data-aos-duration="2000">
              <button class="button-menu" id="button-menu"><i class="fa fa-bars" aria-hidden="true"></i></button>
              <img src="img/logo.png" alt="">
            </div>
            <div class="header-content" data-aos="zoom-in">
               Welcome to Helpdesk System
            </div>
            <div class="header-user" data-aos="fade-left" data-aos-duration="2000">
              <div class="header-user-notify">Chào <span class="name"><?=$_SESSION['username']?></span></div>
              <form action="" method="POST">
              <button type="submit" name="logout" class="button-log-out">
               <i class="fa fa-share-square" aria-hidden="true"></i>
              </button>
              </form>
            </div>
          </header>
         <!-- End phần header   -->
         <div class="main ">
           
               <div class="full-nav">
                   <nav class="menu-lateral">
                     <a class ="func active" href="#"><i class="fa fa-home fa-spin" aria-hidden="true"></i>
                      <span>Trang chủ</span> </a>
                     <hr>
                     <a class="func" href="#"><i class="fa fa-exclamation-triangle " aria-hidden="true"></i> <span>Báo lỗi<span></span></a>
                     <a class="func" href="#"><i class="fa fa-search " aria-hidden="true"></i>

                      <span>Tra cứu lỗi</span></a>
                     <hr>
                     <a class="func" href="#"><i class="fa fa-book" aria-hidden="true"></i><span>Thông tin phần cứng</span></a>
                     <hr>
                     <a class="func" href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i><span> Sự cố mới</span></a>
                     <a class="func" href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> <span>Phân công</span></a>
                     <a class="func" href="#"><i class="fa fa-calendar-check-o" aria-hidden="true"></i><span> Kết quả</span></a>
                     <hr>
                     <a class="func" href="#"><i class="fa fa-list-alt" aria-hidden="true"></i> <span>Danh sách FAQ</span></a>
                     <a class="func" href="#"><i class="fa fa-plus-square" aria-hidden="true"></i><span> Thêm mới FAQ</span></a>
                     <a class="func" href="#"><i class="fa fa-wrench" aria-hidden="true"></i> <span>Cập nhật FAQ</span></a>
                   </nav>
                   
               </div>
               <div class="content">
                  ?php include "file.php"   ;             ?>
   
               </div>
           
       </div>
        </div>
         
       
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  </body>
</html>