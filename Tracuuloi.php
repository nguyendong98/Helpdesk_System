<head>

    <link rel="stylesheet" href="css/css/style.css" />



</head>
<div class="s003 d-flex justify-content-center px-3 pb-5" >

    <form action="" method="POST" >
        <h2 class="text-center mb-2" style="color: #aaaaaa">What problem are you looking for?</h2>
        <div class="inner-form" style="border-radius: 10px">
            <div class="input-field first-wrap d-flex justify-content-center align-items-center">
                <div class="input-select">
                    <select name="category" data-trigger="" name="choices-single-defaul" style="border: none; color: #aaaaaa">
                        <option value="tất cả" placeholder="" style="border: none; color: #aaaaaa">Category</option>
                        <?php
                            $result = mysqli_query($conn, "SELECT * FROM phancung");
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                                <option value="<?=$row['PC_TEN']?>" style="border: none; color: #aaaaaa"><?=$row['PC_TEN']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="input-field second-wrap">
                <input type="hidden" name="content" value="tracuuloi">
                <input id="search" name="timkiem" type="text" placeholder="Enter Keywords?" />
            </div>
            <div class="input-field third-wrap" >
                <button name="btnlook" class="btn-search" type="submit" style="border-radius: 0 10px 10px 0 !important">
                    <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </form>

</div>
<?php
if(isset($_POST['btnlook'])){
    $tim = $_POST['timkiem'];
    $category = $_POST['category'];
    switch ($category) {
        case "tất cả":
            $sql = "select nhanvien.NV_HOTEN,suco.SC_ID, suco.SC_THOIDIEMGAP, suco.SC_THOIDIEMGHINHAN, 
                suco.SC_MOTACHITIET, suco.SC_ANHMANHINH, suco.SC_IDTRANGTHAI, suco.SC_DIADIEM, phancung.PC_TEN 
                FROM nhanvien, suco, phancung 
                WHERE nhanvien.NV_ID = suco.SC_IDNVGAPSUCO AND suco.SC_IDPHANCUNG=phancung.PC_ID 
                AND suco.SC_MOTACHITIET like '%".$tim."%' ";
            break;
        case "$category":
            $sql = "select nhanvien.NV_HOTEN,suco.SC_ID, suco.SC_THOIDIEMGAP, suco.SC_THOIDIEMGHINHAN, 
                suco.SC_MOTACHITIET, suco.SC_ANHMANHINH, suco.SC_IDTRANGTHAI, suco.SC_DIADIEM, phancung.PC_TEN 
                FROM nhanvien, suco, phancung 
                WHERE nhanvien.NV_ID = suco.SC_IDNVGAPSUCO AND suco.SC_IDPHANCUNG=phancung.PC_ID 
                AND suco.SC_MOTACHITIET like '%".$tim."%'  
                AND phancung.PC_TEN = '$category'  ";
            break;
    }
    $result=mysqli_query($conn, $sql);
    $tong=mysqli_num_rows($result);
    if($tong == 0){
        echo "<h3 class='text-center'>Xin lỗi, không tìm thấy sự cố bạn cần tìm!!
              <div class='d-flex justify-content-center my-5'>
                    <img src='img/sadicon.jpg' style='width: 100px; height: 100px'>
</div>      
";
    } else {
        ?>
        <h2 class="mx-5 mb-3">Từ khóa <b><?php echo $tim ?></b> thuộc loại phần cứng <b><?php echo $category ?></b> : có <b><?php echo $tong?></b> kết quả </h2>



        <div class="table-responsive px-5">
            <table class="table table-striped b-light" >

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NV gặp sự cố</th>
                    <th scope="col">Tên phần cứng</th>
                    <th scope="col">Tên lỗi</th>
                    <th scope="col">Thời điểm gặp</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$row['NV_HOTEN']?></td>
                            <td><?=$row['PC_TEN']?></td>
                            <td><?=$row['SC_MOTACHITIET']?></td>
                            <td><?=$row['SC_THOIDIEMGAP']?></td>
                            <td><img src="upload/<?=$row['SC_ANHMANHINH']?>" alt="" style="width: 80px; height:50px"></td>
                            <?php
                                switch ($row['SC_IDTRANGTHAI']) {
                                    case 'Chưa xử lí':
                                        echo '<td><div class="badge badge-danger">Chưa xử lí</div></td>';
                                        break;
                                    case 'Đang xử lí':
                                        echo '<td><div class="badge badge-warning">Đang xử lí</div></td>';
                                        break;
                                    case 'Đã xử lí':
                                        echo '<td><div class="badge badge-success">Đã xử lí</div></td>';
                                        break;
                                }
                            ?>


                        </tr>

                <?php $i++; } ?>
                </tbody>
            </table>
        </div>
<?php } }  ?>




