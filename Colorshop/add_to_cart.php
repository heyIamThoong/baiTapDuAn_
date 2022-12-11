<?php
$conn = pdo_get_connection();
if (isset($_POST['add_to_cart'])) {
    if ($_SESSION['user'] == '') {
        header('location:index.php?art=signin');
    } else {
        $pid = $_POST['pid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $quantity = $_POST['quantity'];

        $user_id = $_POST['user_id'];

        $check_cart_numbers = check_cart($name, $user_id);
        $fetch_cart = select_cart_where_pid($pid, $user_id);



        //   if ($fetch_cart['name'] == $name && $fetch_cart['size'] ==  $size) {
        //       $quantity_cart = $fetch_cart['quantity'];
        //       $update_quantity = $quantity_cart + $quantity;
        //       update_quantity_where_pid($update_quantity, $user_id , $fetch_cart['id']);
        //   }else if($fetch_cart['name'] == $name && $fetch_cart['size'] != $size){
        //       insert_cart($user_id, $pid, $name, $size, $price, $quantity, $image);
        //   }else if($fetch_cart['name'] !== $name){
        //       insert_cart($user_id, $pid, $name, $size, $price, $quantity, $image);
        //   }







        if ($check_cart_numbers > 0) {
            echo "<script>
           
alert('Sản phẩm đã tồn tại !')
        </script>";
            $fetch_cart = select_cart_where_pid($pid, $user_id);
            $quantity_cart = $fetch_cart['quantity'];
            $update_quantity = $quantity_cart + $quantity;
            update_quantity_where_pid($update_quantity, $pid, $user_id);
        } else {
            insert_cart($user_id, $pid, $name, $price, $quantity, $image);
        }
    }
}
