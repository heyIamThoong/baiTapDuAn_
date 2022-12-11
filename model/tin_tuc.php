<?php
function insert_news($title,$image,$content){
    $sql = "INSERT INTO `news`(`title`, `img`, `content`) VALUES ('$title','$image','$content')";
    pdo_execute($sql);
}

function show_news(){
    $sql = "SELECT * FROM `news`";
    $list_news = pdo_query($sql);
    return $list_news;
}

function select_news($edit_id){
    $sql = "SELECT * FROM `news` where id_news = '$edit_id'";
    $fetch_news = pdo_query($sql);
    return $fetch_news;
}

function update_title_and_content($title,$content,$edit_id){
    $sql = "UPDATE `news` SET title = '$title' , content = '$content' where id_news = '$edit_id'";
    pdo_execute($sql);
}
function update_image($image,$edit_id){
    $sql = "UPDATE `news` SET img = '$image' WHERE id_news = '$edit_id'";
    pdo_execute($sql);
}

function delete_new($delete_id){
    $sql = "DELETE FROM `news` where id_news = '$delete_id'";
    pdo_execute($sql);
}