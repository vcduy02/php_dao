<?php 
    require "dao/pdo.php";
    require "dao/loai.php";

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
    <link rel="stylesheet" href="./index.css">
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
                <div class="carousel">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <a href="">
                                <img src="./img/iphone-12-chinh-thuc-mo-ban-iphone-12-pro-max-len-ngoi-thumbnail.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                <h4>$999</h4>
                                <p>Iphone 12 Pro Max</p>
                                </div>
                            </a>
                          </div>
                          <div class="carousel-item">
                              <a href="">
                                <img src="./img/galaxy-z-flip-da-vuot-qua-thu-nghiem-cua-ffc-va-san-sang-ra-mat-xtmobile-banner.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                <h4>$699</h4>
                                <p>Samsung Galaxy Z Flip</p>
                                </div>
                              </a>
                          </div>
                          <div class="carousel-item">
                              <a href="">
                                <img src="img/592063.jfif" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                <h4>$399</h4>
                                <p>Xiaomi Mi 11 Lite 5G</p>
                                </div>
                              </a>
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
                <div class="post">
                    <div class="sanpham">
                        <a href="">
                            <img src="img/56567_mbpm1__5_.png" alt="">
                            <h4>$1399</h4>
                            <p>Apple Macbook Pro 13 Touchbar</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="main-right">
                <div class="login">
                    <h5>TÀI KHOẢN</h5>
                    <div class="accounts">
                        <label for="">Tên đăng nhập</label>
                        <br>
                        <input type="username" name="" id="">
                        <br>
                        <label for="">Mật khẩu</label>
                        <br>
                        <input type="password" name="" id="">
                        <br>
                        <input type="checkbox">
                        <label for="">Ghi nhớ tài khoản?</label>
                        <br>
                        <button class="dangnhap" type="submit">Đăng nhập</button>
                        <br>
                        <a href="./quenmatkhau.php">* Quên mật khẩu</a>
                        <br>
                        <a href="./dangky.php">* Đăng ký thành viên</a>
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