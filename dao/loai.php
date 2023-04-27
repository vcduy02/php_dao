<?php
    //Truy vấn danh sách loại
    function lh_selectall(){
        $sql = "SELECT * FROM loaihang";
        return pdo_query($sql);
    }

    //Truy vấn mã loại 
    function lh_select($ma_lh){
        $sql = "SELECT * FROM loaihang WHERE ma_lh=?";
        return pdo_query_one($sql, $ma_lh);
    }

    //Thêm loại hàng
    function lh_insert($ten_lh){
        $sql = "INSERT INTO loaihang(ten_lh) VALUES (?)";
        pdo_execute($sql, $ten_lh);
    }
    
    //Kiểm tra trùng tên loại hàng hay không
    function lh_check($ten_lh){
        $sql = "SELECT * FROM loaihang WHERE ten_lh=?";
        pdo_query_one($sql, $ten_lh);
    }

    //Xóa loại hàng
    function lh_delete($ma_lh){
        $sql = "DELETE FROM loaihang WHERE ma_lh=?";
        pdo_execute($sql, $ma_lh);
    }

    //Cập nhật loại hàng
    function lh_update($ma_lh, $ten_lh){
        $sql = "UPDATE loaihang SET ten_lh=? WHERE ma_lh=?";
        pdo_execute($sql, $ten_lh ,$ma_lh);
    }
?>