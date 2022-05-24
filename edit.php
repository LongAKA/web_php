<?php
    require("connect.php");
    if(isset($_POST["btn_capnhat"])){
        $id = $_POST["id"];
        $name = $_POST["txt_name"];
        $add = $_POST["txt_add"];
        $file = $_FILES['file']['name'];
        $file_tem_loc = $_FILES[ "file"]["tmp_name"];
        $file_store ="upload/".$file;
        if($file != NULL){
            move_uploaded_file($file_tem_loc, 'upload/'.$file);
            $query = "UPDATE quan16 SET fullname='$name', address='$add', avatar='$file' WHERE id='$id'";
            $query_run = mysqli_query($conn, $query);
            if($query_run){
                echo '<script language="javascript">alert("Cập nhật dữ liệu thành công!");window.location="index.php";</script>';
            }
            else{
                echo '<script language="javascript">alert("Cập nhật dữ liệu không thành công!");window.location="index.php";</script>';
            }
        }
    }
?>