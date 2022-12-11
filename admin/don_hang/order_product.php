<?php include_once 'views/header.php' ?>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4" style="font-size: 40px;">Danh sách chi tiết đơn hàng</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id hóa đơn</th>
                        <th scope="col">Id sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $order_id = $_GET['order_code'];
                    $fetch_order = select_order_product($order_id);


                    foreach ($fetch_order as $order) { ?>
                        <tr>
                            <td><?= $order['order_code'] ?></td>
                            <td><?= $order['id_sp'] ?></td>
                            <td><?= $order['name'] ?></td>
                            <td>$<?= $order['price'] ?></td>
                            <td><?= $order['so_luong'] ?></td>
                            <td><?= $order['don_gia'] ?></td>
                        </tr>



                    <?php

                    }

                    ?>



                </tbody>
            </table>


            <div class="method">

                <?php
                $method = $_GET['method'];
                $order_id = $_GET['order_code'];
                if ($method == 'VNPAY') {
                    echo "<h5>Đặt hàng qua VNPAY</h5>";
                    $fetch_vnpay = select_order_vnpay($order_id);
                    foreach ($fetch_vnpay as $vnpay) { ?>
                        <p>Mã VNPAY : <?= $vnpay['id_vnpay'] ?></p>
                        <p>Tổng tiền : <?= $vnpay['vnp_amount'] ?> VND</p>
                        <p>Ngân hàng : <?= $vnpay['vnp_bankCode'] ?></p>
                        <p>Hình thức : <?= $vnpay['vnp_cardtype'] ?></p>
                        <p>Đơn hàng từ :<?= $vnpay['vnp_orderinfo'] ?></p>
                        <p>Ngày đặt : <?= $vnpay['vnp_paydate'] ?></p>
                        <p>Mã hóa đơn : <?= $vnpay['order_code'] ?></p>
                <?php
                    }
                }
                ?>

                <?php
                $method = $_GET['method'];
                $order_id = $_GET['order_code'];
                if ($method == 'MOMO ATM') {
                    echo "<h5>Đặt hàng qua MOMO</h5>";
                    $fetch_vnpay = select_order_momoAtm($order_id);
                    foreach ($fetch_vnpay as $vnpay) { ?>
                        <p>Mã MOMO : <?= $vnpay['id_momo'] ?></p>
                        <p>Tổng tiền : <?= $vnpay['amount'] ?> VND</p>
                        <p>Hình thức : <?= $vnpay['payType'] ?></p>
                        <p>Đơn hàng từ :<?= $vnpay['order_Info'] ?></p>
                        <p>Mã hóa đơn : <?= $vnpay['order_code'] ?></p>
                <?php
                    }
                }
                ?>



            </div>


        </div>
    </div>
</div>

<?php include_once 'views/footer.php' ?>