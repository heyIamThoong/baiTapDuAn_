<?php include 'views/header.php' ?>
    <?php 
        if(is_array($list_one_kh)){
            extract($list_one_kh);
        }
    ?>
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Update khách hàng</h6>
   
            <form action="index.php?action=update_kh" method="post" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Tên khách hàng"  value="<?=$name?>">
                    <label for="floatingInput">Name</label>
                    <b style="color:red;"><?php echo isset($_SESSION['name']) ? $_SESSION['name']  : "" ?></b><br> 
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="pass" class="form-control" placeholder="Pass"  value="<?=$pass?>">
                    <label for="">Pass</label>
                    <b style="color:red;"><?php echo isset($_SESSION['pass']) ? $_SESSION['pass']  : "" ?></b><br> 
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="address" class="form-control" placeholder="Address"  value="<?=$address?>">
                    <label for="">Address</label>
                    <b style="color:red;"><?php echo isset($_SESSION['address']) ? $_SESSION['address']  : "" ?></b><br> 
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Email"  value="<?=$email?>">
                    <label for="">Email</label>
                    <b style="color:red;"><?php echo isset($_SESSION['email']) ? $_SESSION['email']  : "" ?></b><br> 
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="Phone"  value="<?=$phone?>">
                    <label for="">Phone</label>
                    <b style="color:red;"><?php echo isset($_SESSION['phone']) ? $_SESSION['phone']  : "" ?></b><br> 
                </div>
                <input type="hidden" value="<?=$id_kh?>" name="id_kh">
                <button type="submit" style="margin-top:1.5px" class="btn btn-primary" name="update_kh">Sửa khách hàng</button>
                <a href="index.php?action=list_khachhang" class="btn btn-primary m-2">Danh sách khách hàng</a>
            </form>
    </div>
<?php  include 'views/footer.php' ?>
