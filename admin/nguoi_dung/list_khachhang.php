

<?php include 'views/header.php' ?>



<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4" style="font-size:40px">Danh sách người dùng</h6>
        <form style="margin:20px 500px 50px 0" method="post">
            <input class="form-control border-1" name="search_box" type="text" placeholder="Search" required>
        </form>
        <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">user id</th>
                            <th scope="col">username</th>
                            <th scope="col">Mật khẩu</th>
                            <th scope="col">address</th>
                            <th scope="col">email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
    
                        <?php foreach ($list_khachhang as $kh) {
                            ?>
                            <tr>
                                    <td><?php echo $kh['id_kh'] ?></td>
                                    <td><?php echo $kh['name'] ?></td>
                                    <td><?php echo $kh['pass'] ?></td>
                                    <td><?php echo $kh['address'] ?></td>
                                    <td><?php echo $kh['email'] ?></td>
                                    <td><?php echo $kh['phone'] ?></td>
                                    <td>
                                    <a href="index.php?action=sua_kh&id_kh=<?php echo $kh['id_kh']?>"   class="delete-btn">Sửa</a>
                                    </td>
                                    <td>
                                    <a href="index.php?action=xoa_kh&id_kh=<?php echo $kh['id_kh']?>" onclick="return confirm('bạn có thật sự muốn xoá không???')"  class="delete-btn">Xóa</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                            
                    </tbody>
                </table>
        </div>
    </div>
</div>
<?php include 'views/footer.php' ?>
