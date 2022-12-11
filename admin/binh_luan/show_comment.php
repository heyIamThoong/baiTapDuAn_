<?php include 'views/header.php' ?>
<table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="font-size: 15px;">ID</th>
                        <th scope="col" style="font-size: 15px;">ID user</th>
                        <th scope="col" style="font-size: 15px;">ID sản phẩm</th>
                        <th scope="col" style="font-size: 15px;">user_name</th>
                        <th scope="col" style="font-size: 15px;">Nội dung bình luận</th>
                        <th scope="col" style="font-size: 15px;">Ngày bình luận</th>
                        <th scope="col" style="font-size: 15px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($list_bl as $key => $row) {
                        ?>
                    
                            <tr>
                                <td><?php echo $row['id_bl'] ?></td>
                                <td><?php echo $row['iduser'] ?></td>
                                <td><?php echo $row['idsp'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['noidung'] ?></td>
                                <td><?php echo $row['ngay_binh_luan'] ?></td>
                                <td><a href="index.php?action=xoabl&id_bl=<?php echo $row['id_bl'] ?>" onclick="return confirm('Bạn có thực sự muốn xoá không???')" class="delete-btn" >Xóa</a></td>
                            </tr>
                        <?php } ?>  
                    
                </tbody>
            </table>
<?php include 'views/footer.php' ?>