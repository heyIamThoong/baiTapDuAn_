 
<?php
    session_start();
    include '../model/pdo.php';
    include '../model/binhluan.php';
    $id_sp = $_REQUEST['idsp'];
    $list_bl = loadall_binhluan($id_sp);
?>

    <section class="danhmuc">
    <section class="top">
                <h2>COMMENT</h2>
            </section>
            <section class="text1 binhluan">
                <table>
                    <?php
                        foreach ($list_bl as $binhluan) {
                            extract($binhluan);

                            echo '<tr><td>'.$noidung.'</td>';
                            echo '<td>'.$name.'</td>';
                            echo '<td>'.$ngay_binh_luan.'</td></tr>';

                        }
                    ?>
                </table>
            </section>
            <section class="top">
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                <input type="hidden" name="id_sp" value="<?=$id_sp?>" class="input">
                <br>
                <textarea  id="" cols="150" name="noidung" rows="6" placeholder=" &ensp; Write a comment" ></textarea>
                <br>
                <!-- <input type="text" name="noidung"> -->
                <input type="submit" value="POST COMMENT  " name="guibinhluan" class="button" >
            </form>  
        </section>
        <?php
            if(isset($_POST['guibinhluan'])){

                if(!isset($_SESSION['user'])){
                    echo "<script>alert('Bạn cần đăng nhập để bình luận')</script>";
                    header('location:index.php?art=signin');
                    
                }else{
                    $noidung=$_POST['noidung'];
                    $id_sp = $_POST['id_sp'];
                    $iduser= $_SESSION['user']['id_kh'];
                    $name = $_SESSION['user']['name'];
                    $ngaybinhluan = date('h:i:sa d/m/Y');
                    add_binhluan($noidung,$iduser,$id_sp,$name,$ngaybinhluan);
                    header('location:'.$_SERVER['HTTP_REFERER']);
                }
               
            }
        ?>
            
    </section>
    


 <style>    
 h2{

 }
 table {
    margin-left : 7px;
 }
            table td {
                border-bottom: 1px solid #FF3366;
                padding-left:90px;
                padding-right: 90px;
                border-radius : 10px;
            }
             .button {
                    background-color : #fe4c50;
                    border : 1px solid white;
                    color :white;
                    border-radius : 5px;      
                    width: 200px;
                    height: 30px;
                }
                textarea {
                    border : 1px solid white;
                    border-radius : 10px 10px 0px 0px;      
                    border-bottom : 2px solid  #fe4c50;
                    background-color : rgb(232,232,232) ;
                }
            </style>