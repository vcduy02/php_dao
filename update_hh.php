<?php 
    require "dao/pdo.php";
    require "dao/loai.php";
    require "dao/hang.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $ma_hh = $_POST['ma_hh'];
        $ten_hh = $_POST['ten_hh'];
        $gia = $_POST['gia'];
        $giamgia = $_POST['giamgia'];
        $anh = $_POST['anh'];
        $ma_lh = $_POST['ma_lh'];
        $hangdb = $_POST['hangdb'];
        $ngaynhap = $_POST['ngaynhap'];
        $mota = $_POST['mota'];

        if ($_FILES['anh']['size'] > 0){
            $anh = $_FILES['anh']['name'];
        }
       
        for ($i = 0; $i < sizeof($hangdb); $i++){
            $sql = "UPDATE hanghoa SET hangdb='".$hangdb[$i]."' WHERE ma_hh=$ma_hh";
            pdo_execute($sql);
        }

        hh_update($ma_hh, $ten_hh, $gia, $giamgia, $anh, $ma_lh, $ngaynhap, $mota);

        if ($_FILES['anh']['size'] > 0){
            move_uploaded_file($_FILES['anh']['tmp_name'], 'img/' . $anh);
        }

        header("location:danhsach_hh.php");
        die;
    }

    $loaihang = lh_selectall();

    $ma_hh = $_GET['ma_hh'];
    $hanghoa = hh_select($ma_hh);

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
                    <?php if (isset($kq)) : ?>
                        <div style="color: red;">
                            <?= $kq ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <div class="in-form">
                                <label for=""><b>MÃ HÀNG HÓA</b></label>
                                <br>
                                <input type="text" placeholder="auto number" name="ma_hh" readonly value="<?= $hanghoa['ma_hh'] ?>">
                            </div>
                            <div class="in-form">
                                <label for=""><b>TÊN HÀNG HÓA</b></label>
                                <br>
                                <input type="text" name="ten_hh" value="<?= $hanghoa['ten_hh'] ?>">
                            </div>
                            <div class="in-form">
                                <label for=""><b>ĐƠN GIÁ</b></label>
                                <br>
                                <input type="number" name="gia" value="<?= $hanghoa['gia'] ?>">
                            </div>
                            <div class="in-form">
                                <label for=""><b>GIẢM GIÁ (%)</b></label>
                                <br>
                                <input type="number" name="giamgia" value="<?= $hanghoa['giamgia'] ?>">
                            </div>
                            <div class="in-form">
                                <label for=""><b>HÌNH ẢNH</b></label>
                                <br>
                                <input type="file" name="anh" id="">
                                <img src="img/<?= $hanghoa['anh'] ?>" width="150">
                                <input type="hidden" name="anh" value="<?= $hanghoa['anh'] ?>">
                            </div>
                            <div class="in-form">
                                <label for=""><b>LOẠI HÀNG</b></label>
                                <br>
                                <select name="ma_lh" id="">
                                    <?php foreach ($loaihang as $lh) : ?>
                                        <?php if ($lh['ma_lh'] == $hanghoa['ma_lh']) : ?>
                                            <option value="<?= $lh['ma_lh'] ?>" selected><?= $lh['ten_lh'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $lh['ma_lh'] ?>"><?= $lh['ten_lh'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="in-form">
                                <label for=""><b>HÀNG ĐẶC BIỆT?</b></label>
                                <br>
                                <div class="div-box">
                                    <p><?= $hanghoa['hangdb'] ?></p>
                                    <input type="checkbox" name="hangdb[]" value="Đặc biệt">   
                                    <label for="">Đặc biệt</label>                         
                                    <input type="checkbox" name="hangdb[]" value="Bình thường">
                                    <label for="">Bình thường</label>
                                </div>
                            </div>
                            <div class="in-form">
                                <label for=""><b>NGÀY NHẬP</b></label>
                                <br>
                                <input type="text" name="ngaynhap" value="<?= $hanghoa['ngaynhap'] ?>">
                            </div>
                            <div class="in-form">
                                <label for=""><b>VIEW</b></label>
                                <br>
                                <input type="number" placeholder="0" name="view" value="<?= $hanghoa['view'] ?>" readonly>
                            </div>
                            <div class="in-form">
                                <label for=""><b>MÔ TẢ</b></label>
                                <br>
                                <textarea name="mota" id="" cols="159" rows="5"><?= $hanghoa['mota'] ?></textarea>
                            </div>
                        </div>
                        <div class="button-end">
                            <button class="add" type="submit">Cập nhật</button>
                            <a href="./update_hh.php">Nhập lại</a>
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