<?php 
    session_start();
    require "dao/pdo.php";
    require "dao/loai.php";
    require "dao/hang.php";

    $hanghoa = hh_selectall();

    $loaihang = lh_selectall();

    $ma_hh = $_GET['ma_hh'];
    $hanghoa = hh_select($ma_hh);

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'";
        $result = pdo_query_one($sql);

        if ($result['usertype'] == "admin"){
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['hoten'] = $result['hoten'];
            header('location:dangnhap.php');
        }else if ($result['usertype'] == "user"){
            $_SESSION['id_users'] = $result['id_user'];
            $_SESSION['hoten'] = $result['hoten'];
            header('location:dangnhap.php');
        }else{
            $erros = 'Tên đăng nhập hoặc mật khẩu sai';
        }
    }

    if (isset($_SESSION['id_user'])) {
        $id = $_SESSION['id_user'];
        $sql = "SELECT * FROM users WHERE id_user=$id";
        $users = pdo_query_one($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./sanpham.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="title">
                <h1>SIÊU THỊ TRỰC TUYẾN</h1>
            </div>
        </header>

        <nav class="nav-bar">
            <ul>
                <li><a href="./index.php">Trang chủ</a></li>
                <li><a href="">Giới thiệu</a></li>
                <li><a href="">Liên hệ</a></li>
                <li><a href="">Góp ý</a></li>
                <li><a href="">Hỏi đáp</a></li>
            </ul>
        </nav>

        <main>
            <div class="main-left">
                <div class="post">
                    <img src="./img/<?= $hanghoa['anh'] ?>" alt="">
                    <ul>
                        <li>Mã HH: <?= $hanghoa['ma_hh'] ?></li>
                        <li>Tên HH: <?= $hanghoa['ten_hh'] ?></li>
                        <li>Đơn giá: <?= $hanghoa['gia'] ?></li>
                        <li>Giảm giá: <?= $hanghoa['giamgia'] ?>%</li>
                    </ul>
                    <p><?= $hanghoa['mota'] ?></p>
                </div>
                <div class="cmt">
                    <h4>BÌNH LUẬN</h4>
                    <div class="in-cmt">
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                    <p><b>Đăng nhập để bình luận về sản phẩm này</b></p>
                </div>
                <div class="lienquan">
                    <h4>HÀNG CÙNG LOẠI</h4>
                    <ul>
                        <?php foreach ($hanghoa as $hh) : ?>
                            <li><a href=""><? $hh['ten_hh'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>

            <div class="main-right">
                <div class="login">
                    <h5>TÀI KHOẢN</h5>
                    <?php if (isset($_SESSION['id_user'])) { ?>
                        <div class="accounts">
                            <div class="infor">
                                <?php if ($users['usertype'] == "admin") { ?>
                                    <img src="./img/<?= $users['hinhanh'] ?>" alt="">
                                    <p><?= $users['hoten'] ?></p>
                                    <a href="./thongtin.php">* Thay đổi thông tin</a>
                                    <br>
                                    <a href="./insert_lh.php">* Quản trị website</a>
                                    <br>
                                    <a href="./logout.php">* Đăng xuất</a>
                                <?php } else { ?>
                                    <img src="./img/<?= $users['hinhanh'] ?>" alt="">
                                    <p><?= $users['hoten'] ?></p>
                                    <a href="./thongtin.php">* Thay đổi thông tin</a>
                                    <br>
                                    <a href="./logout.php">* Đăng xuất</a>
                                <?php } ?>
                            </div>
                            
                            <a href="./quenmatkhau.php">* Quên mật khẩu</a>
                            <br>
                            <a href="./dangky.php">* Đăng ký thành viên</a>
                        </div>
                    <?php } else { ?>
                        <div class="accounts">
                            <?php if(isset($erros)) : ?>
                                <div style="color: red;">
                                    <p><?= $erros ?></p>
                                </div>
                            <?php endif ?>
                            <form action="" method="post">
                                <input type="hidden" name="id_user">
                                <label for="">Tên đăng nhập</label>
                                <br>
                                <input type="username" name="username" id="">
                                <br>
                                <label for="">Mật khẩu</label>
                                <br>
                                <input type="password" name="password" id="">
                                <br>
                                <input type="checkbox">
                                <label for="">Ghi nhớ tài khoản?</label>
                                <br>
                                <button class="dangnhap" type="submit">Đăng nhập</button>
                                <br>
                                <a href="./quenmatkhau.php">* Quên mật khẩu</a>
                                <br>
                                <a href="./dangky.php">* Đăng ký thành viên</a>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <div class="danhmuc">
                    <h6>DANH MỤC</h6>
                    <div class="in-danhmuc">
                        <?php foreach ($loaihang as $lh) : ?>
                                <a href="./<?= $lh['link_lh'] ?>"><?= $lh['ten_lh'] ?></a>
                            <?php endforeach ?>
                        </div>
                    <div class="timkiem">
                        <input type="search" placeholder="Từ khóa tìm kiếm">
                    </div>
                </div>
                <div class="top10">
                    <h6>TOP 10 YÊU THÍCH</h6>
                    <div class="top10s">
                        <div class="in-top10s">
                            <a href="">
                                <img src="img/dien-thoai-iphone-13-pro-max-1tb-xanh-duong-1.jpg" alt="">
                                <p>Iphone 13 Pro Max</p>
                            </a>
                        </div>
                        <div class="in-top10s">
                            <a href="">
                                <img src="img/FLRC-214-B0-SkyBlue-01-PDP-GALLERY-1600x1200.jpg" alt="">
                                <p>Samsung Galaxy Ultra</p>
                            </a>
                        </div>
                        <div class="in-top10s">
                            <a href="">
                                <img src="img/xiaomi-12-Pro.png" alt="">
                                <p>Xiaomi 12 Pro</p>
                            </a>
                        </div>
                        <div class="in-top10s">
                            <a href="">
                                <img src="img/211031055723-apple-watch-series-7-gps-41mm-blue-aluminum-abyss-blue-sport-band-34fr-screen-usen-1.jpeg" alt="">
                                <p>Apple Watch S7</p>
                            </a>
                        </div>
                        <div class="in-top10s">
                            <a href="">
                                <img src="img/Samsung-Galaxy-Watch-4-44mm-grn-1.jpg" alt="">
                                <p>Samsung Galaxy Watch 4</p>
                            </a>
                        </div>
                        <div class="in-top10s">
                            <a href="">
                                <img src="img/xiaomi-watch-s1-active-thumb-mobelat.jpg" alt="">
                                <p>Xiaomi Watch S1</p>
                            </a>
                        </div>
                        <div class="in-top10s">
                            <a href="">
                                <img src="img/62265_laptop_dell_inspiron_7306_2.jpg" alt="">
                                <p>Dell Inspiron 7306</p>
                            </a>
                        </div>
                        <div class="in-top10s">
                            <a href="">
                                <img src="img/canon-eos-4000d-kit-1855mm-f3556-iii-den.jpg" alt="">
                                <p>Canon Eos 4000D Kit</p>
                            </a>
                        </div>
                        <div class="in-top10s">
                            <a href="">
                                <img src="img/nuoc-hoa-dior-miss-dior-eau-de-parfum-cho-nu-100ml-5f10201aa1eb9-16072020163834.jpg" alt="">
                                <p>Dior Miss Dior Eau De Parfum</p>
                            </a>
                        </div>
                        <div class="in-top10s">
                            <a href="">
                                <img src="img/538f08bb7145f516d65456f9a6e39b6b.jpg" alt="">
                                <p>Túi xách du lịch Hàn Quốc</p>
                            </a>
                        </div>
                    </div>
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