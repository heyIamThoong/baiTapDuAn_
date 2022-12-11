<?php include 'views/header.php' ?>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">user id</th>
                        <th scope="col">username</th>
                        <th scope="col">email</th>
                        <th scope="col">nội dung</th>
                        <th scope="col">tell</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($list_messages as $key => $fetch_message) {
                ?>
                
                        <tr>
                           <td style="font-size: 15px;"><?= $fetch_message['id_kh'] ?></td>
                           <td style="font-size: 15px;"><?= $fetch_message['name'] ?></td>
                           <td style="font-size: 15px;"><?= $fetch_message['email'] ?></td>
                           <td style="font-size: 15px;"><?= $fetch_message['noidung'] ?></td>
                           <td style="font-size: 15px;"><?= $fetch_message['tell'] ?></td>
                           <td>
                            <a href="index.php?action=delete_phanhoi&id_phanhoi=<?= $fetch_message['id_phanhoi'] ?>" onclick="return confirm('Bạn có muốn xóa tin nhắn này không ? ')" class="delete-btn" >Xóa</a>
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