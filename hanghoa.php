<?php

use JetBrains\PhpStorm\ExpectedValues;

    require "dao/pdo.php";
    require "dao/loai.php";
    require "dao/hang.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $ten_hh = $_POST['ten_hh'];
        $gia = $_POST['gia'];
        $giamgia = $_POST['giamgia'];
        $anh = 'no_image.png';
        if ($_FILES['anh']['size'] > 0){
            $anh = $_FILES['anh']['name'];
        }
        $ma_lh = $_POST['ma_lh'];
        $hangdb = $_POST['hangdb'];
        $ngaynhap = $_POST['ngaynhap'];
        $mota = $_POST['mota'];
        
        for ($i=0; $i < sizeof($hangdb); $i++){
            $sql = "INSERT INTO hanghoa(ten_hh, gia, giamgia, anh, ma_lh, hangdb, ngaynhap, mota) VALUES ('$ten_hh', '$gia', '$giamgia', '$anh', '$ma_lh', '".$hangdb."', '$ngaynhap', '$mota')";
            pdo_execute($sql);
        }

        if ($_FILES['anh']['size'] > 0){
            move_uploaded_file($_FILES['anh']['tmp_name'], 'img/' . $anh);
        }

        header("location:danhsach_hh.php?Thêm hàng hóa thành công");
        die;
    }

    $loaihang = lh_selectall();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./hanghoa.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="title">
                <h1>QUẢN TRỊ WEBSITE</h1>
            </div>
        </header>

        <nav class="nav-bar">
            <ul>
                <li><a href="./index.php">Trang chủ</a></li>
                <li><a href="./insert_lh.php">Loại hàng</a></li>
                <li><a href="./hanghoa.php">Hàng hóa</a></li>
                <li><a href="">Khách hàng</a></li>
                <li><a href="">Bình luận</a></li>
                <li><a href="">Thống kê</a></li>
            </ul>
        </nav>

        <main>
            <div class="insert">
                <h3>THÊM MỚI HÀNG HÓA</h3>
                <div class="in-insert">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <div class="in-form">
                                <label for=""><b>MÃ HÀNG HÓA</b></label>
                                <br>
                                <input type="text" placeholder="auto number" readonly>
                            </div>
                            <div class="in-form">
                                <label for=""><b>TÊN HÀNG HÓA</b></label>
                                <br>
                                <input type="text" name="ten_hh" id="">
                            </div>
                            <div class="in-form">
                                <label for=""><b>ĐƠN GIÁ</b></label>
                                <br>
                                <input type="number" name="gia" id="">
                            </div>
                            <div class="in-form">
                                <label for=""><b>GIẢM GIÁ (%)</b></label>
                                <br>
                                <input type="number" name="giamgia" id="">
                            </div>
                            <div class="in-form">
                                <label for=""><b>HÌNH ẢNH</b></label>
                                <br>
                                <input type="file" name="anh" id="">
                            </div>
                            <div class="in-form">
                                <label for=""><b>LOẠI HÀNG</b></label>
                                <br>
                                <select name="ma_lh" id="">
                                    <?php foreach ($loaihang as $lh) : ?>
                                        <option value="<?= $lh['ma_lh'] ?>"><?= $lh['ten_lh'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="in-form">
                                <label for=""><b>HÀNG ĐẶC BIỆT?</b></label>
                                <br>
                                <div class="div-box">
                                    <input type="checkbox" name="hangdb[]" value="Đặc biệt">   
                                    <label for="">Đặc biệt</label>                         
                                    <input type="checkbox" name="hangdb[]" value="Bình thường">
                                    <label for="">Bình thường</label>
                                </div>
                            </div>
                            <div class="in-form">
                                <label for=""><b>NGÀY NHẬP</b></label>
                                <br>
                                <input type="text" name="ngaynhap" id="">
                            </div>
                            <div class="in-form">
                                <label for=""><b>VIEW</b></label>
                                <br>
                                <input type="number" placeholder="0" name="view" id="" readonly>
                            </div>
                            <div class="in-form">
                                <label for=""><b>MÔ TẢ</b></label>
                                <br>
                                <textarea name="mota" id="" cols="159" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="button-end">
                            <button class="add" type="submit">Thêm mới</button>
                            <a href="./hanghoa.php">Nhập lại</a>
                            <a href="./danhsach_hh.php">Danh sách</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </main>

        <footer>
            <p>Copyright © 2022</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>