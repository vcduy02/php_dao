<?php
    //Truy vấn danh sách hàng hóa
    function hh_selectall(){
        $sql = "SELECT * FROM hanghoa";
        return pdo_query($sql);
    }

    //Truy vấn mã hàng hóa
    function hh_select($ma_hh){
        $sql = "SELECT * FROM hanghoa WHERE ma_hh=?";
        return pdo_query_one($sql, $ma_hh);
    }

    //Thêm hàng hóa
    function hh_insert($ten_hh, $gia, $giamgia, $anh, $ma_lh, $hangdb, $ngaynhap, $mota){
        $sql = "INSERT INTO hanghoa(ten_hh, gia, giamgia, anh, ma_lh, hangdb, ngaynhap, mota) VALUES (?)";
        pdo_execute($sql, $ten_hh, $gia, $giamgia, $anh, $ma_lh, $hangdb, $ngaynhap, $mota);
    }
    
    //Kiểm tra trùng tên hàng hóa hay không
    function hh_check($ten_lh){
        $sql = "SELECT * FROM loaihang WHERE ten_lh=?";
        pdo_query_one($sql, $ten_lh);
    }

    //Xóa hàng hóa
    function hh_delete($ma_hh){
        $sql = "DELETE FROM hanghoa WHERE ma_hh=?";
        pdo_execute($sql, $ma_hh);
    }

    //Cập nhật hàng hóa
    function hh_update($ma_hh, $ten_hh, $gia, $giamgia, $anh, $ma_lh, $ngaynhap, $mota){
        $sql = "UPDATE hanghoa SET ten_hh=?, gia=?, giamgia=?, anh=?, ma_lh=?, ngaynhap=?, mota=? WHERE ma_hh=?";
        pdo_execute($sql, $ten_hh, $gia, $giamgia, $anh, $ma_lh, $ngaynhap, $mota, $ma_hh);
    }
?>