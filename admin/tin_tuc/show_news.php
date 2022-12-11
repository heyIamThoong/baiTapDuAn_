<?php include 'views/header.php' ?>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Danh sách tin tức</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">TITLE</th>
                        <th scope="col">IMAGES</th>
                        <th scope="col">CONTENT</th>
                        <th scope="col">DATE</th>
                        <th scope="col">EDIT</th> 
                        <th scope="col">DELETE</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_news as $item) {?>
                        <!-- // extract($item);
                        // echo '
                           
                        // <tr>
                        //     <td> ' . $item['title'] . ' </td>
                        //     <td> ' . $item['img'] . ' </td>
                        //     <td> ' . $item['content'] . ' </td>
                        //     <td> ' . $item['date'] . '</td>
                        //     <td>
                        //     <a href="index.php?action=delete_messages&delete=' . $item['id_phanhoi'] . '" class="delete-btn">Xóa</a>
                        //     </td>

                        //     <td>
                        //     <a href="index.php?action=delete_messages&delete=' . $item['id_phanhoi'] . '" class="delete-btn">Xóa</a>
                        //     </td>
                        // </tr
                        // '; -->
                        <tr>
                            <td><?= $item['title']  ?></td>
                            <td><img src="uploaded_img/<?= $item['img'] ?>" alt="" width="150" height="150" ></td>
                            <td><?= $item['content'] ?></td>
                            <td><?= $item['date'] ?></td>
                            <td>
                                <a href="index.php?action=edit_news&edit=<?= $item['id_news'] ?>"  class="btn btn-primary m-2">Sửa</a>
                            </td>
                            <td>
                            <a href="index.php?action=delete_new&delete=<?= $item['id_news'] ?>"  class="btn btn-danger m-2" onclick="return confirm('Bạn có muốn xóa tin tức này không ? ')">Xóa</a>
                            </td>
                        </tr>
                <?php    } ?>



                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'views/footer.php' ?>