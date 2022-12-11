<?php include_once 'views/header.php' ?>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4" style="font-size: 40px;">Danh sách đơn hàng </h6>

        <form style="margin:20px 500px 50px 0" method="post">
            <input class="form-control border-1" name="search_box" type="text" placeholder="Search" required>
        </form>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Người dùng</th>
                        <th scope="col">Mã HD</th>
                        <th scope="col">date</th>
                      
                   
                    
                        <th scope="col">total price</th>
                        <th scope="col">payment method</th>
                        <th scope="col" colspan="3">patment status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (isset($_POST['search_box'])) {
                        $search_box = $_POST['search_box'];
                        $fetch_order = search_order($search_box);
                        foreach ($fetch_order as $order) {
                    ?>
                            <tr>
                                <th><?= $order['user_id'] ?></th>
                                <td><a href="index.php?action=order_product&order_code=<?= $order['order_code'] ?>"><?= $order['order_code'] ?></a></td>
                                <td><?= $order['date'] ?></td>
                    
                              
                                <td>$<?= $order['total_price'] ?></td>
                                <td><?= $order['method'] ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                                        <select name="payment_status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                            <option selected disabled><?= $order['payment_status'] ?></option>
                                            <option value="pending">Chưa hoàn thành</option>
                                            <option value="completed">Hoàn thành</option>
                                        </select>
                                        <input type="submit" value="Update" name="update_payment" class="btn btn-warning m-2" style="color: white;">
                                        <a href="index.php?action=order_admin&delete=<?= $order['order_code'] ?>" onclick="return confirm('delete this order?');">Xóa</a>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        $fetch_order = select_order();
                        foreach ($fetch_order as $order) {
                        ?>

                            <tr>
                            <th><?= $order['user_id'] ?></th>
                                <td><a href="index.php?action=order_product&order_code=<?= $order['order_code'] ?>&method=<?= $order['method'] ?>"><?= $order['order_code'] ?></a></td>
                                <td><?= $order['date'] ?></td>

                               
                                <td>$<?= $order['total_price'] ?></td>
                                <td><?= $order['method'] ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                                        <select name="payment_status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                            <option selected disabled><?= $order['payment_status'] ?></option>
                                            <option value="pending">Chưa hoàn thành</option>
                                            <option value="completed">Hoàn thành</option>
                                        </select>
                                        <input type="submit" value="Update" name="update_payment" class="btn btn-warning m-2" style="color: white;">
                                        <a href="index.php?action=order_admin&delete=<?= $order['order_code'] ?>" onclick="return confirm('delete this order?');">Xóa</a>
                                    </form>
                                </td>
                            </tr>

                    <?php  }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>



<?php include_once 'views/footer.php' ?>