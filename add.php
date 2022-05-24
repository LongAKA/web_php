<?php
    require("connect.php");
    if(isset($_POST["save"])){
        $name = $_POST["txt_name"];
        $add = $_POST["txt_add"];
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_parts =explode('.',$_FILES['file']['name']);
        $file_ext=strtolower(end($file_parts));
        $image = $_FILES['file']['name'];
        $target = "upload/".basename($image);
        $sql = "INSERT INTO quan16 (fullname,address,avatar) VALUES ('$name','$add','$image')";
        mysqli_query($conn, $sql);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        echo '<script language="javascript">alert("Thêm dữ liệu thành công!");window.location="index.php";</script>';
        }else{
        echo '<script language="javascript">alert("Đã upload thất bại!");window.location="index.php";</script>';
        }
    }
?>