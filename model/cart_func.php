<?php
function check_cart($name, $user_id)
{
    $conn = pdo_get_connection();
    $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
    $check_cart_numbers->execute([$name, $user_id]);
    return $check_cart_numbers->rowCount();
}

function insert_cart($user_id, $pid, $name, $price, $quantity, $image)
{
    $conn = pdo_get_connection();
    $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name,price, quantity, image) VALUES(?,?,?,?,?,?)");
    return  $insert_cart->execute([$user_id, $pid, $name, $price, $quantity, $image]);
}

function number_of_cart($user_id)
{
    $conn = pdo_get_connection();
    $select_cart = $conn->prepare("SELECT * FROM `cart` where user_id = ? ");
    $select_cart->execute([$user_id]);
    $number_cart = $select_cart->rowCount();
    return $number_cart;
}

function loadAll_cart_where_user_id($user_id)
{
    $sql  = "SELECT * FROM `cart` where user_id = '$user_id'";
    $list_cart = pdo_query($sql);
    return $list_cart;
}
function delete_cart_where_id($delete_id)
{
    $conn = pdo_get_connection();
    $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
    $delete_cart_item->execute([$delete_id]);
}
function select_cart_where_pid($pid, $user_id)
{
    $conn = pdo_get_connection();
    $select_pid = $conn->prepare("SELECT * FROM  `cart` where pid = ? AND user_id = ?  ");
    $select_pid->execute([$pid, $user_id]);
    $fetch_cart = $select_pid->fetch(PDO::FETCH_ASSOC);
    return $fetch_cart;
}
function update_quantity($qty, $cart_id)
{
    $conn = pdo_get_connection();
    $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
    return   $update_qty->execute([$qty, $cart_id]);
}
function update_quantity_where_pid($qty,$pid,$user_id)
{
    $conn = pdo_get_connection();
    $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE pid = ? AND  user_id = ? ");
    return   $update_qty->execute([$qty, $pid,$user_id,]);
}
function delete_cart_all($user_id)
{
    $conn = pdo_get_connection();
    $delete_cart_item = $conn->prepare("DELETE FROM `cart` where user_id = ? ");
    return  $delete_cart_item->execute([$user_id]);
}

function function_alert($message)
{
    echo "<script>alert('$message');</script>";
}


function insert_order($oder_code,$user_id, $method, $total_price, $date)
{
    $conn = pdo_get_connection();
    $insert_order = $conn->prepare("INSERT INTO `hoa_don`(order_code,user_id, method,total_price,date) VALUES(?,?,?,?,?)");
    return $insert_order->execute([$oder_code,$user_id, $method, $total_price, $date]);
}


function select_order_by_user_id($user_id)
{
    $conn = pdo_get_connection();
    $select_order = $conn->prepare("SELECT * FROM `hoa_don` where user_id = ? order by id desc");
    $select_order->execute([$user_id]);
    $fetch_order = $select_order->fetch(PDO::FETCH_ASSOC);
    return $fetch_order;
}
function select_cart_where_id($user_id)
{
    $sql = "SELECT * FROM `cart` WHERE user_id = '$user_id'";
    $list_cart = pdo_query($sql);
    return $list_cart;
}

function insert_order_detail($order_id, $product_id, $name, $price, $quantity, $total_price)
{
    $conn = pdo_get_connection();
    $sql = "INSERT INTO `ct_hoadon`(`order_code`, `id_sp`,`name`, `price`, `so_luong`, `don_gia`) VALUES (?,?,?,?,?,?)";
    $insert_order_products = $conn->prepare($sql);
    $insert_order_products->execute([$order_id, $product_id, $name, $price, $quantity, $total_price]);
}
function select_order()
{
    $sql = "SELECT * FROM `hoa_don` order by id desc";
    $list_order = pdo_query($sql);
    return $list_order;
}

function select_order_where_userID($user_id){
       $conn = pdo_get_connection();
       $sql  = "SELECT * FROM `hoa_don` where user_id = ? ";
       $select_order = $conn->prepare($sql);
       $select_order->execute([$user_id]);
       $fetch_order = $select_order->fetch(PDO::FETCH_ASSOC);
       return $fetch_order;
}
function select_order_where_idKH($user_id){
    $conn = pdo_get_connection();
    $sql  = "SELECT * FROM `hoa_don` where user_id = ? order by id desc";
    $select_order = $conn->prepare($sql);
    $select_order->execute([$user_id]);
    $fetch_order = $select_order->fetchAll(PDO::FETCH_ASSOC);
    return $fetch_order;
}

function delete_order($delete_id)
{
    $conn = pdo_get_connection();
    $delete_order = $conn->prepare("DELETE FROM `hoa_don` where order_code = ?");
    return $delete_order->execute([$delete_id]);
}

function delete_order_where_userID($delete_id)
{
    $conn = pdo_get_connection();
    $delete_order = $conn->prepare("DELETE FROM `hoa_don` where user_id = ?");
    return $delete_order->execute([$delete_id]);
}

function select_order_product_where_orderCode($order_code){
    $conn = pdo_get_connection();
    $select_product = $conn->prepare("SELECT * FROM `ct_hoadon` where order_code = ? ");
    $select_product->execute([$order_code]);
    $fetch_product = $select_product->fetch(PDO::FETCH_ASSOC);
    return $fetch_product;
}

function select_order_product_where_maHD($order_code){
    $conn = pdo_get_connection();
    $select_product = $conn->prepare("SELECT * FROM `ct_hoadon` where order_code = ? ");
    $select_product->execute([$order_code]);
    $fetch_product = $select_product->fetchAll(PDO::FETCH_ASSOC);
    return $fetch_product;
}


function delete_order_product($order_id)
{
    $conn = pdo_get_connection();
    $delete_order_product = $conn->prepare("DELETE FROM `ct_hoadon` where order_code = ?");
    return $delete_order_product->execute([$order_id]);
}

function update_payment($payment_status, $order_id)
{
    $conn = pdo_get_connection();
    $update_payment = $conn->prepare("UPDATE `hoa_don` SET payment_status = ? WHERE id = ?");
    return $update_payment->execute([$payment_status, $order_id]);
    // $sql = "update hoa_don set payment_status='$payment_status' where id=".$order_id;
    // pdo_execute($sql);
}

function select_order_pending()
{
    $sql = "SELECT * FROM `hoa_don` where payment_status = 'pending' order by id desc";
    $list_order_pending = pdo_query($sql);
    return $list_order_pending;
}
function select_order_completed()
{
    $sql = "SELECT * FROM `hoa_don` where payment_status = 'completed' order by id desc";
    $list_order_pending = pdo_query($sql);
    return $list_order_pending;
}

function select_order_product($order_id)
{
    $sql = "SELECT * FROM `ct_hoadon` where order_code = '$order_id'";
    $list_order_product = pdo_query($sql);
    return $list_order_product;
}


//Tìm kiếm hóa đơn 

function search_order($search)
{
    $sql = "SELECT * FROM `hoa_don` WHERE order_code LIKE '%{$search}%'";
    $list_order = pdo_query($sql);
    return $list_order;
}






///Thanh toán vnpay
function insert_vnpay_order($vnp_Amount,$vnp_BankCode,$vnp_BankTranNo, $vnp_CardType,$vnp_OrderInfo , $vnp_PayDate ,$vnp_TmnCode ,  $vnp_TransactionNo ,  $order_code ){
    $conn = pdo_get_connection();
    $sql = "INSERT INTO `order_vnpay`(`vnp_amount`, `vnp_bankCode`, `vnp_banktranno`, `vnp_cardtype`, `vnp_orderinfo`, `vnp_paydate`, `vnp_tmncode`, `vnp_transactionno`, `order_code`) VALUES (?,?,?,?,?,?,?,?,?)";
    $insert_vnpay=  $conn->prepare($sql);
   return $insert_vnpay->execute([$vnp_Amount,$vnp_BankCode,$vnp_BankTranNo, $vnp_CardType,$vnp_OrderInfo , $vnp_PayDate ,$vnp_TmnCode ,  $vnp_TransactionNo ,  $order_code]);
}

function select_order_vnpay($order_id)
{
    $sql = "SELECT * FROM `order_vnpay` where order_code = '$order_id'";
    $list_order_vnpay = pdo_query($sql);
    return $list_order_vnpay;
}

function delete_order_vnpay($order_code){
    $conn = pdo_get_connection();
    $sql = "DELETE FROM `order_vnpay` WHERE order_code = ? ";
    $delete_vnpay = $conn->prepare($sql);
    $delete_vnpay->execute([$order_code]);
}


//Thanh toán momo atm
function insert_momo_atm( $partnerCode ,  $orderId,  $amount ,$orderInfo , $orderType ,   $transId  ,  $payType ,  $order_code){
    $conn = pdo_get_connection();
    $sql = "INSERT INTO `order_momo_atm`( `partnerCode`, `order_id`, `amount`, `order_Info`, `order_Type`, `trans_Id`, `payType`, `order_code`) VALUES (?,?,?,?,?,?,?,?)";
    $insert_momo_atm = $conn->prepare($sql);
return    $insert_momo_atm->execute([$partnerCode ,  $orderId,  $amount ,$orderInfo , $orderType ,   $transId  ,  $payType ,  $order_code]);
}
function select_order_momoAtm($order_id)
{
    $sql = "SELECT * FROM `order_momo_atm` where order_code = '$order_id'";
    $list_order_momo = pdo_query($sql);
    return $list_order_momo;
}
function delete_order_momo($order_code){
    $conn = pdo_get_connection();
    $sql = "DELETE FROM `order_momo_atm` WHERE order_code = ? ";
    $delete_momo_atm = $conn->prepare($sql);
    $delete_momo_atm->execute([$order_code]);
}












