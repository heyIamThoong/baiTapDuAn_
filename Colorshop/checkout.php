<?php include 'layout/header_user.php' ?>

<!-- Checkout Section Begin -->
<section class="checkout spad" style="margin-top: 100px;">
    <div class="container">
        <div class="checkout__form">
            <?php if (isset($_SESSION['user'])) {
                extract($_SESSION['user']);
            }
            ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="coupon__code"><span class="icon_tag_alt"></span>Checkout</h6>
                        <h6 class="checkout__title">Billing Details</h6>

                        <input type="hidden" name="user_id" value="<?= $id_kh ?>">


                        <div class="checkout__input">
                            <p>Họ và tên<span>*</span></p>
                            <input type="text" name="fullname" value="<?= $name ?>">
                            <?php
                            if (isset($error['fullname'])) { ?>
                                <p style="color: red;"><?= $error['fullname'] ?></p>
                            <?php  } ?>
                        </div>


                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>

                            <input type="text" name="address" placeholder="Street Address" class="checkout__input__add" value="<?= $address ?>">
                            <?php
                            if (isset($error['address'])) {
                            ?>
                                <p style="color: red;"><?= $error['address']
                                                        ?></p>
                            <?php  }
                            ?>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="number" value="<?= $phone ?>">
                                    <?php
                                    if (isset($error['number'])) { ?>
                                        <p style="color: red;"><?= $error['number'] ?></p>
                                    <?php  } ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>

                                    <input type="text" name="email" value="<?= $email ?>">
                                    <?php
                                    if (isset($error['email'])) {
                                    ?>
                                        <p style="color: red;"><?= $error['email']
                                                                ?></p>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input">
                            <p>Ghi chú<span>*</span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." name="note">
                            <?php
                            if (isset($error['note'])) { ?>
                                <p style="color: red;"><?= $error['note'] ?></p>
                            <?php  } ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul class="checkout__total__products">
                                <?php
                                $grand_total = 0;
                                $fetch_cart = loadAll_cart_where_user_id($id_kh);
                                foreach ($fetch_cart as $item) {
                                    $grand_total += ($item['price'] * $item['quantity']);
                                ?>
                                    <li><?= $item['name'] ?> <span>$ <?= $item['price'] ?></span> <span style="padding:0px 10px">x<?= $item['quantity'] ?> </span></li>
                                    <input type="hidden" name="pid" value="<?= $item['pid'] ?>">
                                    <input type="hidden" name="quantity" value="<?= $item['quantity'] ?>">
                                    <input type="hidden" name="price" value="<?= $item['price'] ?>">

                                <?php } ?>
                            </ul>
                            <ul class="checkout__total__all">

                                <li>Sub Total <span>$<?= $grand_total ?></span></li>
                            </ul>
                            <input type="hidden" value="<?= $grand_total ?>" name="total_price">
                            <div class="option">
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Thanh toán khi nhận hàng
                                        <input type="radio" name="method" id="payment" value="Thanh toán khi nhận hàng">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                               
                                <div class="checkout__input__checkbox">
                                    <label for="vnpay">
                                        VNPAY
                                        <input type="radio" name="method" id="vnpay" value="VNPAY">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="momo_ATM">
                                        MOMO ATM
                                        <input type="radio" name="method" id="momo_ATM" value="momo_atm">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- <div class="checkout__input__checkbox">
                                    <label for="momo_QR">
                                        MOMO QR CODE
                                        <input type="radio" name="method" id="momo_QR" value="momo_QR">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->

                                <?php
                                if (isset($error['method'])) { ?>
                                    <p style="color: red;"><?= $error['method'] ?></p>
                                <?php } ?>
                            </div>
                            <button type="submit" class="site-btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>" name="checkout">PLACE ORDER</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Checkout Section End -->

<?php include 'layout/footer_user.php' ?>