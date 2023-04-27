<?php 
    session_start();
    require "dao/pdo.php";
    require "dao/loai.php";
    require "dao/hang.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id_user'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $hinhanh = $_POST['hinhanh'];
        
        if ($_FILES['hinhanh']['size'] > 0){
            $hinhanh = $_FILES['hinhanh']['name'];
        }

        $sql = "UPDATE users SET username='$user', password='$pass', hoten='$hoten', email='$email', hinhanh='$hinhanh' WHERE id_user=$id";
        pdo_execute($sql);
        var_dump($id);
        

        if ($_FILES['hinhanh']['size'] > 0){
            move_uploaded_file($_FILES['hinhanh']['tmp_name'], 'img/' . $hinhanh);
        }
        
        header("location:thongtin.php?message=Cập nhật thành công");
        die;
    }
    
    $id = $_SESSION['id_user'];
    $sql = "SELECT * FROM users WHERE id_user=$id";
    $users = pdo_query_one($sql);
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
                <h1>QUẢN TRỊ TÀI KHOẢN</h1>
            </div>
        </header>

        <nav class="nav-bar">
            <ul>
                <li><a href="./index.php">Trang chủ</a></li>
                <li><a href="./thongtin.php">Thông tin</a></li>
            </ul>
        </nav>

        <main>
            <div class="insert">
                <h3>CẬP NHẬT TÀI KHOẢN</h3>
                <div class="in-insert">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="text" name="id_user" hidden>
                        <label for=""><b>Tên đăng nhập</b></label>
                        <br>
                        <input type="text" name="username" value="<?= $users['username']?>">
                        <br>
                        <label for=""><b>Mật khẩu</b></label>
                        <br>
                        <input type="text" name="password" value="<?= $users['password']?>">
                        <br>
                        <label for=""><b>Họ và tên</b></label>
                        <br>
                        <input type="text" name="hoten" value="<?= $users['hoten']?>">
                        <br>
                        <label for=""><b>Email</b></label>
                        <br>
                        <input type="text" name="email" value="<?= $users['email']?>">
                        <br>
                        <label for=""><b>Hình ảnh</b></label>
                        <br>
                        <input type="file" name="hinhanh">
                        <img src="./img/<?= $users['hinhanh']?>" width="200">
                        <input type="hidden" name="hinhanh" value="<?= $users['hinhanh']?>">
                        <br>
                        <div class="button-end">
                            <button class="add" type="submit">Thay đổi</button>
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