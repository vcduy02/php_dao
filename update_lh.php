<?php 
    require "dao/pdo.php";
    require "dao/loai.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $ma_lh = $_POST['ma_lh'];
        $ten_lh = $_POST['ten_lh'];
        
        lh_update($ma_lh, $ten_lh);
        
        header("location:danhsach_lh.php?message=Cập nhật thành công");
        die;
    }

    $ma_lh = $_GET['ma_lh'];
    $loaihang = lh_select($ma_lh);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CẬP NHẬT LOẠI HÀNG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./insert_lh.css">
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
                <h3>CẬP NHẬT LOẠI HÀNG</h3>
                <div class="in-insert">
                    <form action="" method="post">
                        <label for=""><b>Mã loại</b></label>
                        <br>
                        <input type="number" name="ma_lh" value="<?= $loaihang['ma_lh']?>" readonly>
                        <br>
                        <label for=""><b>Tên loại</b></label>
                        <br>
                        <input type="text" name="ten_lh" value="<?= $loaihang['ten_lh']?>">
                        <br>
                        <div class="button-end">
                            <button class="add" type="submit">Cập nhật</button>
                            <a href="./update_lh.php">Nhập lại</a>
                            <a href="./insert_lh.php">Thêm mới</a>
                            <a href="./danhsach_lh.php">Danh sách</a>
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