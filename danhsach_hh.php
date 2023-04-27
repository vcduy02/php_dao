<?php 
    require "dao/pdo.php";
    require "dao/loai.php";
    require "dao/hang.php";

    $hanghoa = hh_selectall();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./danhsach_hh.css">
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
                <h3>DANH SÁCH HÀNG HÓA</h3>
                <table class="table">
                    <thead>
                        <tr class="tr_title">
                            <th scope="col"></th>
                            <th scope="col">MÃ HH</th>
                            <th scope="col">TÊN HH</th>
                            <th scope="col">ĐƠN GIÁ</th>
                            <th scope="col">GIẢM GIÁ</th>
                            <th scope="col">LƯỢT XEM</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hanghoa as $hh) : ?>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td><?= $hh['ma_hh'] ?></td>
                                <td><?= $hh['ten_hh'] ?></td>
                                <td><?= $hh['gia'] ?>$</td>
                                <td><?= $hh['giamgia'] ?></td>
                                <td><?= $hh['view'] ?></td>
                                <td class="edit">
                                    <a href="./update_hh.php?ma_hh=<?= $hh['ma_hh'] ?>">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc chắc xóa không?')" href="./delete_hh.php?ma_hh=<?= $hh['ma_hh'] ?>">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="button-end">
                <a href="">Chọn tất cả</a>
                <a href="">Bỏ chọn tất cả</a>
                <a href="">Xóa các mục chọn</a>
                <a href="./hanghoa.php">Nhập thêm</a>
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