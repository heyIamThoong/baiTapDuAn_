<?php
session_start();
include '../model/pdo.php';
include '../model/khachhang.php';
include '../model/danhmuc.php';
include '../model/sanpham.php';
include '../model/tin_tuc.php';
include '../model/phan_hoi.php';
include '../model/cart_func.php';
include '../ColorShop/mail/sendMail.php';
include 'config_vnpay.php';
//include '../ColorShop/mail/sendMail.php';
$list_dm = loadall_danhmuc();
$list_sp = loadall_sanpham(0, "");
if (isset($_GET['art'])) {
    $art = $_GET['art'];
    switch ($art) {
        case 'login':
            $error = array();
            $thongbao = '';
            if (isset($_POST['register'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];

                $same_name = select_user_where_name($user);
                $same_email = select_user_where_email($email);
                $same_phone = select_user_where_phone($phone);
                $regFullname =
                "/^(([a-zA-Z\sÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầ
                  ẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]*)([a-zA-Z\s\'ÀÁÂÃÈÉÊÌÍÒÓ
                  ÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộ
                  ớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]*)([a-zA-Z\sÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầ
                  ẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]))*$/";
                    if (empty($user)) {
                        $error['user'] = "Tên đăng nhập không được trống !";
                    } else if ($same_name > 0) {
                        $error['user'] = "Tên đăng nhập đã tồn tại";
                    }else if(!preg_match($regFullname , $user)){
                        $error['user'] = "Các ký tự chữ cái a - z !";
                    }

                $likeEmail = "/^\w+@(\w+\.\w+){1,2}$/";
                if (empty($email)) {
                    $error['email'] = "Email không được trống !";
                } else if (!preg_match($likeEmail, $email)) {
                    $error['email']  = "Email không đúng định dạng";
                } else if ($same_email > 0) {
                    $error['email'] = "Email đã tồn tại !";
                }

                $regSDT = "/^0[0-9]{9}$/";
                if (empty($phone)) {
                    $error['phone'] = "phone không được trống !";
                } else if (!preg_match($regSDT, $phone)) {
                    $error['phone']  = "phone không đúng định dạng";
                } else if ($same_phone > 0) {
                    $error['phone'] = "phone đã tồn tại !";
                }

                $regPasswword = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
                if (empty($pass)) {
                    $error['pass'] = "Mật khẩu không được trống !";
                } else if (!preg_match($regPasswword , $pass)) {
                    $error['pass'] = "Tối thiểu tám ký tự, ít nhất một chữ cái và một số !";
                }

                if (empty($address)) {
                    $error['address'] = "Địa chỉ không được trống !";
                }

                if (empty($error)) {
                    add_khachhang($user, $pass, $address, $email, $phone);
                    $thongbao = "Đăng ký thành công , hãy đăng nhập ngay !";
                }
            }
            include 'login.php';
            break;
        case 'signin':
            if (isset($_POST['signup'])) {
                $thongbao = '';
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $check_kh = check_kh($email, $pass);
                if (is_array($check_kh)) {
                    $_SESSION['user'] = $check_kh;
                    header('location:index.php');
                } else {
                    $thongbao = 'Email hoặc mật khẩu không đúng !';
                    include 'signin.php';
                }
            } else {
                include 'signin.php';
            }
            break;
        case 'logout':
            unset($_SESSION['user']);
            include 'layout/home_user.php';
            break;
        case 'quenmk':
            if(isset($_POST['quen_mk'])){
                $email = $_POST['email'];
                $quen_mk = quen_mk($email);
                if(is_array($quen_mk)){
                    $notification = "Mật khẩu của bạn là: ".$quen_mk['pass'];
                }else{
                    $notification = "Email không tồn tại";
                }
                $likeEmail = "/^\w+@(\w+\.\w+){1,2}$/";
                if($email == ""){
                    $notification = "Email không được để trống";
                }else if (!preg_match($likeEmail, $email)) {
                    $notification  = "Email không đúng định dạng";
                }
            }
            include 'quenmk.php';
            break;
        case 'update_user':
            if (isset($_POST['update_user'])) {
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $id_kh = $_POST['id_kh'];

                if($pass == ""){
                    $error_pass = "Mật khẩu không được để trống";
                }
                if($address == ""){
                    $error_address = "Địa chỉ không được để trống";
                }
                $regSDT = "/^0[0-9]{9}$/";
                if($phone == ""){
                    $error_phone = "Số điện thoại không được để trống";
                }else if(!preg_match($regSDT, $phone)){
                    $error_phone = "Số điện thoại không đúng định dạng";
                }
                if(!isset($error_pass) && !isset($error_address) && !isset($error_phone)){
                    update_khachhang($name, $pass, $address, $email, $phone, $id_kh);
                    $_SESSION['user'] = check_kh($email, $pass);
                    
                    // header('location:index.php');
                    echo '<script>
                            alert("Cập nhật thành công");
                        </script>';
                }
            }
            include 'update_user.php';
            break;
        case 'categories':
            if (isset($_GET['id'])) {
                $iddm = $_GET['id'];
                $list_sp = loadall_sanpham($iddm, "");
            } else {
                $list_sp = loadall_sanpham(0, "");
            }
            if(isset($_POST['search_box'])){
                $search = $_POST['search_box'];
                $list_sp = loadall_sanpham(0, $search);
            }
            $list_dm = loadall_danhmuc();
            include 'categories.php';
            break;
        case 'pages':
            include 'pages.php';
            break;
        case 'contact':
            $error = array();
            if (isset($_POST['send_messages'])) {

                if ($_SESSION['user'] == '') {
                    header('location:index.php?art=signin');
                } else {

                    $user_id = $_POST['user_id'];


                    if (empty($_POST['name'])) {
                        $error['name']  = "Tên không được trống";
                    } else {
                        $name = $_POST['name'];
                    }


                    if (empty($_POST['email'])) {
                        $error['email'] = "Email không được trống !";
                    } else {
                        $likeEmail = "/^\w+@(\w+\.\w+){1,2}$/";
                        if (!preg_match($likeEmail, $_POST['email'])) {
                            $error['email']  = "Email không đúng định dạng";
                        } else {
                            $email = $_POST['email'];
                        }
                    }

                    if (empty($_POST['phone'])) {
                        $error['phone'] = 'Số điện thoại không được trống !';
                    } else {
                        $regSDT = "/^0[0-9]{9}$/";
                        if (!preg_match($regSDT, $_POST['phone'])) {
                            $error['phone'] = "Số điện thoại không đúng định dạng";
                        } else {
                            $phone = $_POST['phone'];
                        }
                    }

                    if (empty($_POST['content'])) {
                        $error['content']  = "Tin nhắn không được trống";
                    } else {
                        $content = $_POST['content'];
                    }

                    if (empty($error)) {
                        insert_messages($name, $email, $content, $phone, $user_id);
                        echo '<script>
                    alert("Gửi thành công , chúng tôi sẽ sớm phản hồi lại bạn");
                </script>';
                    }
                }
            }
            include 'contact.php';
            break;
        case 'cart':
            if (isset($_SESSION['user']))
                if (isset($_GET['delete'])) {
                    $delete_id = $_GET['delete'];
                    delete_cart_where_id($delete_id);
                }

            if (isset($_POST['update_quantity'])) {
                $cart_id = $_POST['cart_id'];
                $qty = $_POST['quantity'];
                update_quantity($qty, $cart_id);
            }

            if (isset($_SESSION['user'])) {
                extract($_SESSION['user']);
            }
            if (isset($_GET['delete_all'])) {
                delete_cart_all($id_kh);
            }
            include 'carrt.php';
            break;

        case 'single':
            if (isset($_GET['id_sp'])) {
                $id_sp = $_GET['id_sp'];
                $list_one_sp = loadone_sanpham($id_sp);
                extract($list_one_sp);
                $list_sp_cungloai = load_sp_cungloai($iddm, $id_sp);
            }
            $list_one_sp = loadone_sanpham($id_sp);
            include 'single.php';
            break;
        case 'checkout':

            if (isset($_POST['checkout'])) {
                $error = array();
                $user_id = $_POST['user_id'];

                // $name = $_POST['fullname'];


                // $number = $_POST['number'];


                // $email = $_POST['email'];
                if (empty($_POST['fullname'])) {
                    $error['fullname']  = "Tên không được trống";
                } else {
                    $name = $_POST['fullname'];
                }


                if (empty($_POST['email'])) {
                    $error['email'] = "Email không được trống !";
                } else {
                    $likeEmail = "/^\w+@(\w+\.\w+){1,2}$/";
                    if (!preg_match($likeEmail, $_POST['email'])) {
                        $error['email']  = "Email không đúng định dạng";
                    } else {
                        $email = $_POST['email'];
                    }
                }

                if (empty($_POST['number'])) {
                    $error['number'] = 'Số điện thoại không được trống !';
                } else {
                    $regSDT = "/^0[0-9]{9}$/";
                    if (!preg_match($regSDT, $_POST['number'])) {
                        $error['number'] = "Số điện thoại không đúng định dạng";
                    } else {
                        $number = $_POST['number'];
                    }
                }


                if (empty($_POST['method'])) {
                    $error['method'] = "Bạn chưa chọn phương thức thanh toán";
                } else {
                    $method = $_POST['method'];
                }
                $address = $_POST['address'];
                $date = date('h:i:sa d/m/Y');
                if (empty($_POST['note'])) {
                    $error['note'] = "Xin hãy để lại ghi chú của bạn !";
                } else {
                    $note = $_POST['note'];
                }
                $order_code = rand(0, 9999);

                $total_price = $_POST['total_price'];
                $_SESSION['total_price'] = $total_price;

                if (empty($error)) {
                    if ($method == 'Thanh toán khi nhận hàng') {
                        $number_cart = number_of_cart($user_id);
                        if ($number_cart > 0) {
                            if (insert_order($order_code, $user_id, $method, $total_price, $date)) {
                                $fetch_order = select_order_by_user_id($user_id);
                                $order_id = $fetch_order['id'];

                                $fetch_cart = select_cart_where_id($user_id);
                                $noiDung = "<p>Cảm ơn quý khách đã đặt hàng với mã hóa đơn : " . $order_code . "</p>";
                                $noiDung .= "<h2>Đơn hàng bao gồm : </h2>";
                                foreach ($fetch_cart as $key => $val) {
                                    $product_id = $val['pid'];
                                    $name_product =  $val['name'];
                                    $quantity = $val['quantity'];
                                    $price = $val['price'];

                                    $total_price = $quantity * $price;

                                    $noiDung .= "<ul style='border:1px solid black ; margin:10px;'>
                                    <li>Mã sản phẩm : " . $product_id . "</li>
                                    <li>Tên sản phẩm : " . $name_product . "</li>
                                    <li>Tên sản phẩm : " . $price . "</li>
                            
                                    <li>Số lượng : " . $quantity . "</li>
                                    <li>Tồng tiền : " . $total_price . "</li>
                                </ul>";


                                    insert_order_detail($order_code, $product_id, $name_product, $price, $quantity, $total_price);
                                }


                                //Send Mail 
                                if (isset($_SESSION['user'])) {
                                    extract($_SESSION['user']);
                                }

                                $tieuDe = "Đặt hàng từ website DeigoShop";

                                $mailDatHang = $email;

                                dathangmail($tieuDe, $noiDung, $mailDatHang);
                            }
                            $success_message[] = 'Đặt hàng thành công !';
                            delete_cart_all($user_id);
                        }
                        echo "<script>
                        window.location.href='index.php?art=send_mail_success'
                    </script>";
                    } else if ($method == 'VNPAY') {

                        // echo "Thanh toán bằng VNPAY";
                        $vnp_TxnRef = $order_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                        $vnp_OrderInfo = 'Thanh toán hóa đơn tại website deigoShop';
                        $vnp_OrderType = 'billpayment';

                        $vnp_Amount =  $total_price * 23875;
                        $vnp_Locale = 'vn';
                        $vnp_BankCode = 'NCB';
                        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                        //Add Params of 2.0.1 Version
                        $vnp_ExpireDate = $expire;

                        $inputData = array(
                            "vnp_Version" => "2.1.0",
                            "vnp_TmnCode" => $vnp_TmnCode,
                            "vnp_Amount" => $vnp_Amount,
                            "vnp_Command" => "pay",
                            "vnp_CreateDate" => date('YmdHis'),
                            "vnp_CurrCode" => "VND",
                            "vnp_IpAddr" => $vnp_IpAddr,
                            "vnp_Locale" => $vnp_Locale,
                            "vnp_OrderInfo" => $vnp_OrderInfo,
                            "vnp_OrderType" => $vnp_OrderType,
                            "vnp_ReturnUrl" => $vnp_Returnurl,
                            "vnp_TxnRef" => $vnp_TxnRef,
                            "vnp_ExpireDate" => $vnp_ExpireDate

                        );

                        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                            $inputData['vnp_BankCode'] = $vnp_BankCode;
                        }
                        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                        }

                        //var_dump($inputData);
                        ksort($inputData);
                        $query = "";
                        $i = 0;
                        $hashdata = "";
                        foreach ($inputData as $key => $value) {
                            if ($i == 1) {
                                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                            } else {
                                $hashdata .= urlencode($key) . "=" . urlencode($value);
                                $i = 1;
                            }
                            $query .= urlencode($key) . "=" . urlencode($value) . '&';
                        }

                        $vnp_Url = $vnp_Url . "?" . $query;
                        if (isset($vnp_HashSecret)) {
                            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                        }
                        $returnData = array(
                            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                        );
                        if (isset($_POST['checkout'])) {
                            $_SESSION['order_code'] = $order_code;



                            header('Location: ' . $vnp_Url);
                            die();
                        } else {
                            echo json_encode($returnData);
                        }

                        echo "<script>
                        window.location.href='index.php?art=send_mail_success'
                    </script>";
                    } else if ($method == 'momo_QR') {
                        include '../ColorShop/momo/MOMO_QR.php';
                    } else if ($method == 'momo_atm') {
                        include '../ColorShop/momo/MOMO_atm.php';
                    }
                }
            }



            include 'checkout.php';
            break;

        case 'new_details':
            include_once 'news_detail.php';
            break;
        case 'send_mail_success':

            //Thanh toán vnpay
            if (isset($_GET['vnp_Amount'])) {
                $vnp_Amount = $_GET['vnp_Amount'];
                $vnp_BankCode = $_GET['vnp_BankCode'];
                $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
                $vnp_CardType = $_GET['vnp_CardType'];
                $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
                $vnp_PayDate = $_GET['vnp_PayDate'];
                $vnp_TmnCode = $_GET['vnp_TmnCode'];
                $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
                $order_code = $_SESSION['order_code'];
                if (insert_vnpay_order($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_TmnCode,  $vnp_TransactionNo,  $order_code)) {
                    if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);
                    }
                    $user_id = $id_kh;
                    $method = 'VNPAY';
                    $date = date('h:i:sa d/m/Y');
                    $total_price = $_SESSION['total_price'];
                    if (insert_order($order_code, $user_id, $method, $total_price, $date)) {
                        $fetch_order = select_order_by_user_id($user_id);
                        $order_id = $fetch_order['id'];

                        $fetch_cart = select_cart_where_id($user_id);
                        $noiDung = "<p>Cảm ơn quý khách đã đặt hàng với mã hóa đơn : " . $order_code . "</p>";
                        $noiDung .= "<h2>Đơn hàng bao gồm : </h2>";
                        foreach ($fetch_cart as $key => $val) {
                            $product_id = $val['pid'];
                            $name_product =  $val['name'];
                            $quantity = $val['quantity'];
                            $price = $val['price'];

                            $total_price = $quantity * $price;

                            $noiDung .= "<ul style='border:1px solid black ; margin:10px;'>
                            <li>Mã sản phẩm : " . $product_id . "</li>
                            <li>Tên sản phẩm : " . $name_product . "</li>
                            <li>Tên sản phẩm : " . $price . "</li>
                    
                            <li>Số lượng : " . $quantity . "</li>
                            <li>Tồng tiền : " . $total_price . "</li>
                        </ul>";


                            insert_order_detail($order_code, $product_id, $name_product, $price, $quantity, $total_price);
                        }
                        //Send Mail 
                        if (isset($_SESSION['user'])) {
                            extract($_SESSION['user']);
                        }

                        $tieuDe = "Đặt hàng từ website DeigoShop";

                        $mailDatHang = $email;

                        dathangmail($tieuDe, $noiDung, $mailDatHang);
                    }
                    $success_message[] = 'Đặt hàng thành công !';
                    delete_cart_all($user_id);
                }
            }

            if (isset($_GET['partnerCode'])) {
                $partnerCode = $_GET['partnerCode'];
                $orderId = $_GET['orderId'];
                $amount = $_GET['amount'];
                $orderInfo = $_GET['orderInfo'];
                $orderType = $_GET['orderType'];
                $transId = $_GET['transId'];
                $payType = $_GET['payType'];
                $order_code = rand(0, 9999);
                if (insert_momo_atm($partnerCode,  $orderId,  $amount, $orderInfo, $orderType,   $transId,  $payType,  $order_code)) {
                    if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);
                    }
                    $user_id = $id_kh;
                    $method = 'MOMO ATM';
                    $date = date('h:i:sa d/m/Y');
                    $total_price = $_SESSION['total_price'];
                    if (insert_order($order_code, $user_id, $method, $total_price, $date)) {
                        $fetch_order = select_order_by_user_id($user_id);
                        $order_id = $fetch_order['id'];

                        $fetch_cart = select_cart_where_id($user_id);
                        $noiDung = "<p>Cảm ơn quý khách đã đặt hàng với mã hóa đơn : " . $order_code . "</p>";
                        $noiDung .= "<h2>Đơn hàng bao gồm : </h2>";
                        foreach ($fetch_cart as $key => $val) {
                            $product_id = $val['pid'];
                            $name_product =  $val['name'];
                            $quantity = $val['quantity'];
                            $price = $val['price'];

                            $total_price = $quantity * $price;

                            $noiDung .= "<ul style='border:1px solid black ; margin:10px;'>
                        <li>Mã sản phẩm : " . $product_id . "</li>
                        <li>Tên sản phẩm : " . $name_product . "</li>
                        <li>Tên sản phẩm : " . $price . "</li>
                
                        <li>Số lượng : " . $quantity . "</li>
                        <li>Tồng tiền : " . $total_price . "</li>
                    </ul>";


                            insert_order_detail($order_code, $product_id, $name_product, $price, $quantity, $total_price);
                        }
                        //Send Mail 
                        if (isset($_SESSION['user'])) {
                            extract($_SESSION['user']);
                        }

                        $tieuDe = "Đặt hàng từ website DeigoShop";

                        $mailDatHang = $email;

                        dathangmail($tieuDe, $noiDung, $mailDatHang);
                    }
                    $success_message[] = 'Đặt hàng thành công !';
                    delete_cart_all($user_id);
                }
            }




            include_once 'sendMailSuccess.php';
            break;

        case 'order_history':


            include 'don_hang_da_dat.php';
            break;
        default:
            include 'layout/home_user.php';
            break;
    }
} else {
    include 'layout/home_user.php';
}
