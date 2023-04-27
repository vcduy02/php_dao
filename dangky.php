<?php 
    require "./dao/pdo.php";
    require "./dao/loai.php";

    $loaihang = lh_selectall();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $pass1 = $_POST['password1'];
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $hinhanh = 'no_image.png';
        if ($_FILES['hinhanh']['size'] > 0){
            $hinhanh = $_FILES['hinhanh']['name'];
        }

        if (empty($user) || empty($pass) || empty($pass1) || empty($hoten) || empty($email)  || empty($hinhanh)){
            $erros = "Không được để trống mục nào!";
        }else if($pass != $pass1){
            $erros = 'Mật khẩu phải trùng nhau!';
        }else{
            $sql = "INSERT INTO users(username, password, hoten, email, hinhanh) VALUES ('$user', '$pass', '$hoten', '$email', '$hinhanh')";
            pdo_execute($sql);

            if ($_FILES['hinhanh']['size'] > 0){
                move_uploaded_file($_FILES['hinhanh']['tmp_name'], 'img/' . $hinhanh);
            }

            header('location:index.php?Đăng ký thành công');
            die;
        }
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
    <link rel="stylesheet" href="./dangky.css">
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
                <div class="dangky">
                    <h3>ĐĂNG KÝ THÀNH VIÊN</h3>
                    <?php if(isset($erros)) : ?>
                        <div style="color: red;">
                            <p><?= $erros ?></p>
                        </div>
                    <?php endif ?>
                    <div class="infor">
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for=""><b>Tên đăng nhập</b></label>
                            <br>
                            <input type="username" name="username" id="">
                            <br>
                            <label for=""><b>Mật khẩu</b></label>
                            <br>
                            <input type="password" name="password" id="">
                            <br>
                            <label for=""><b>Xác nhận mật khẩu</b></label>
                            <br>
                            <input type="password" name="password1" id="">
                            <br>
                            <label for=""><b>Họ và tên</b></label>
                            <br>
                            <input type="text" name="hoten" id="">
                            <br>
                            <label for=""><b>Địa chỉ email</b></label>
                            <br>
                            <input type="email" name="email" id="">
                            <br>
                            <label for=""><b>Hình</b></label>
                            <input type="file" name="hinhanh">
                            <br>
                            <button class="add" type="submit">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="main-right">
                <div class="login">
                    <h3>ĐĂNG NHẬP</h3>
                    <div class="accounts">
                            <label for=""><b>Tên đăng nhập</b></label>
                            <br>
                            <input type="username" name="" id="">
                            <br>
                            <label for=""><b>Mật khẩu</b></label>
                            <br>
                            <input type="password" name="" id="">
                            <br>
                            <input type="checkbox">
                            <label for="">Ghi nhớ tài khoản?</label>
                            <br>
                            <button class="dangnhap" type="submit">Đăng nhập</button>
                    </div>
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