<?php include 'views/header.php' ?>
<div class="bg-light rounded h-100 p-4">
    <h6 class="mb-4">Thêm Tin Tức</h6>
    <?php
    foreach ($fetch_new as $item) {

    ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="new_id" value="<?= $item['id_news'] ?>">
            <input type="hidden" name="image_old" value="<?= $item['img']; ?>">
            <div class="form-floating mb-3">
                <input type="text" name="title" class="form-control" id="floatingInput" placeholder="Nhập tên tiêu đề" value="<?php echo $item['title'] ?>">
                <label for="floatingInput">Tiêu đề</label>
                <?php if (isset($error['title'])) { ?>
                    <span style="color:red;"><?= $error['title'] ?></span>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Ảnh</label>
                <input class="form-control" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" type="file">
                <?php if (isset($error['image'])) { ?>
                    <span style="color:red;"><?= $error['image'] ?></span>
                <?php } ?>
            </div>
            <div class="form-floating">
                <label for="floatingTextarea">Mô tả</label>
                <textarea style="padding:50px 20px ;" cols="30" rows="10" class="form-control" name="content" placeholder="Leave a content here" id="editor"><?php echo $item['content'] ?></textarea>
                <?php if (isset($error['content'])) { ?>
                    <span style="color:red;"><?= $error['content'] ?></span>
                <?php } ?>
            </div>
            <button type="submit" style="margin-top:1.5px" class="btn btn-primary" name="edit_news">Sửa tin tức</button>
            <a href="index.php?action=list_news" class="btn btn-primary m-2">Danh sách tin tức</a>
        </form>
    <?php } ?>


    <?php include 'views/footer.php' ?>