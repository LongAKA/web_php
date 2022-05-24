<?php
require("connect.php");
    $sql = "DELETE FROM quan16 WHERE id='" . $_GET["id"] . "'";
    if(mysqli_query($conn, $sql))
    {
        echo '<script language="javascript">alert("Xóa dữ liệu thành công!");window.location="index.php";</script>';
       
    }
    else
    {
        echo '<script language="javascript">alert("Xóa dữ liệu không thành công!");window.location="index.php";</script>';
    }

?>