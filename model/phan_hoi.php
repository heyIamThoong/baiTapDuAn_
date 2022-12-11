<?php
    function show_message(){
        $sql = "SELECT * FROM `phan_hoi`";
        $row_message = pdo_query($sql);
        return $row_message;
    }

    function delete_message($delete_id){
        $sql = "DELETE FROM `phan_hoi` where id_phanhoi = '$delete_id'";
        pdo_execute($sql);
    }

    function insert_messages($name,$email,$noidung,$tell,$id_kh){
    $sql  = "INSERT INTO `phan_hoi`(`name`, `email`, `noidung`, `tell`, `id_kh`) VALUES ('$name','$email','$noidung','$tell','$id_kh')";
    pdo_execute($sql);
    }
?>