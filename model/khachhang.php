<?php
    function add_khachhang($user,$pass,$address,$email,$phone) {
        $sql ="insert into khach_hang(name,pass,address,email,phone) values('$user','$pass','$address','$email','$phone')";
        pdo_execute($sql);
    }
    function loadall_khachhang($search) {
        if($search!= ""){
            $sql = "select * from khach_hang where name like '%".$search."%' or phone like '%".$search."%'";
        }else{
            $sql = "select * from khach_hang";
        }
        $list_khachhang = pdo_query($sql);
        return $list_khachhang;
    }
    function delete_khachhang($id_kh) {
        $sql = "delete from khach_hang where id_kh=".$id_kh;
        pdo_execute($sql);
    }
    function update_khachhang($name,$pass,$address,$email,$phone,$id_kh) {
        $sql = "update khach_hang set name='$name', pass='$pass', address='$address', email='$email', phone='$phone' where id_kh =".$id_kh;
        pdo_execute($sql);
    }
    function loadone_khachhang($id_kh) {
        $sql = "select * from khach_hang where id_kh=".$id_kh;
        $listone_khachhang = pdo_query_one($sql);
        return $listone_khachhang;
    }
    function check_kh($email,$pass) {
        $sql = "select * from khach_hang where email='$email' and pass='$pass'";
        $check_kh = pdo_query_one($sql);
        return $check_kh;
    }
    function quen_mk($email) {
        $sql = "select * from khach_hang where email='$email'";
        $quen_mk = pdo_query_one($sql);
        return $quen_mk;
    }

    function select_user_where_name($name){
        $conn = pdo_get_connection();
        $select_user_name = $conn->prepare("SELECT * FROM `khach_hang` where name = ? ");
        $select_user_name->execute([$name]);
        $fetch_name = $select_user_name->rowCount();
        return $fetch_name;
    }
    function select_user_where_email($email){
        $conn = pdo_get_connection();
        $select_user_email = $conn->prepare("SELECT * FROM `khach_hang` where email = ? ");
        $select_user_email->execute([$email]);
        $fetch_email = $select_user_email->rowCount();
        return $fetch_email;
    }
    function select_user_where_phone($phone){
        $conn = pdo_get_connection();
        $select_user_phone = $conn->prepare("SELECT * FROM `khach_hang` where phone = ? ");
        $select_user_phone->execute([$phone]);
        $fetch_phone = $select_user_phone->rowCount();
        return $fetch_phone;
    }

    function thongbao($thongbao){
        echo "<script>
       
          alert($thongbao);
          window.location.reload(); 
      
      </script>";
    }

