<?php
    //Mở kết nối
    function pdo_get_connection(){
        try {
            $conn = new PDO("mysql:host=localhost; dbname=xshop; charset=utf8;", "root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Lỗi kết lối" . $e->getMessage();
        }
    }


    //Thực thi câu lệnh SQL
    function pdo_execute($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
        } catch (PDOException $e) {
            throw $e;
        }
        finally{
            unset($conn);
        }
    }

    //Truy vấn nhiều bản ghi
    function pdo_query($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
        }
        catch(PDOException $e){
        throw $e;
        }
        finally{
        unset($conn);
        }
    }

    //Truy vấn 1 bản ghi
    function pdo_query_one($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
        }
        catch(PDOException $e){
        throw $e;
        }
        finally{
        unset($conn);
        }
    }
    
    //Truy vấn 1 giá trị
    function pdo_query_value($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
        }
        catch(PDOException $e){
        throw $e;
        }
        finally{
        unset($conn);
        }
    }
       
?>