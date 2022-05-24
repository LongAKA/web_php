<?php
    require("connect.php");
    $a = $_POST["data"];
    $sql = "SELECT * FROM quan16 WHERE fullname LIKE '%$a%'";
    $query = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($query);
    if($num > 0) {
        while($row = mysqli_fetch_array($query)){
         ?>
    <tr>
      <td><?php echo $row["fullname"]; ?></td> 
      <td><?php echo $row["address"]; ?></td>
      <td><img src="upload.php<?php echo $row["avatar"] ?>"></td>
    </tr>

    <?php
        }
    }
?>