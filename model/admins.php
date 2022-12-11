<?php
    function  add_admins($user,$pass) {
        $sql = "insert into admins(user,pass) values('$user','$pass')";
        pdo_execute($sql);
    }
    function check_admins($user,$pass) {
        $sql = "select * from admins where user = '$user' and pass = '$pass'";
        $check_admins = pdo_query_one($sql);
        return $check_admins;
    }

    function select_admin_where_name($name){
$conn = pdo_get_connection();
$select_name =  $conn->prepare("SELECT * FROM `admins` where user = ? ");
$select_name->execute([$name]);
$fetch_name =  $select_name->rowCount();
return $fetch_name;
    }
?>