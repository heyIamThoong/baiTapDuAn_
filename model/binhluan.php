<?php 
    function loadall_binhluan($id_sp) {
        $sql ="select * from binh_luan where 1";
        if($id_sp>0){
            $sql.=" and idsp=".$id_sp;
        }else{
            $sql.=" order by id_bl ASC";
        }
        $listbl = pdo_query($sql);
        return $listbl;
    }
    function add_binhluan($noidung,$iduser,$id_sp,$name,$ngaybinhluan) {
        
        $sql = "insert into binh_luan(noidung,iduser,idsp,name,ngay_binh_luan) values('$noidung','$iduser','$id_sp','$name','$ngaybinhluan')";
        pdo_execute($sql);
    }
    function delete_binhluan($id_bl) {
        $sql = "delete from binh_luan where id_bl=".$id_bl;
        pdo_execute($sql);
    }
    
?>