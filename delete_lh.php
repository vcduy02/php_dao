<?php
    require "dao/pdo.php";
    require "dao/loai.php";

    $ma_lh = $_GET['ma_lh'];
    lh_delete($ma_lh);

    header("location:danhsach_lh.php?message=Xóa dữ liệu thành công");
    die;
?>