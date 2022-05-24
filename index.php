<?php
    require("connect.php");
    $sql = "SELECT * FROM quan16";
    $query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css"
    rel="stylesheet"
    />
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <style>
        .from-add {
            width: 90%;
            margin: auto;
            margin-top: 1rem;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            height: 45px;
            border-radius: 5px;
        }
        .from-add .btn-primary {
            margin-top: 5px;
            margin-left: 1rem;
        }
        .img {
            width: 150px;
            height: 100px;
        }
        .img img{
            width: 100%;
            height: 100%;
        }
        .table {
            width: 90%;
            margin: auto;
            margin-top: 1rem;
        }
        .table th{
            background-color: #0066ff;
            color: #fff;
            text-align: center;
        }
        .table td{
            text-align: center;
        }
        .main-src {
            width: 350px;
            margin: auto;
            margin-top: 1rem;
        }
        .has-search .form-control {
            padding-left: 2.375rem;
        }
        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
    </style>
</head>
<body>
    <!--form them--->
    <!-- Button trigger modal -->
    <div class="from-add">
       <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
        Thêm
        </button> 
    </div>
    <div class="main-src">
          <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" class="timkiem form-control" placeholder="Nhập họ tên cần tìm...">
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm học viên</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="add.php" method="POST" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <input type="text" id="form4Example1" class="form-control" name="txt_name" />
                <label class="form-label" for="form4Example1">Full name</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" id="form4Example2" class="form-control" name="txt_add" />
                <label class="form-label" for="form4Example2">Address</label>
            </div>
            <div class="form-outline mb-4">       
                <input type="file" id="form4Example2" class="form-control" name="file" />
            </div>
            <center><button type="submit" class="btn btn-primary" name="save">Save</button></center>
        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<!--hiển thị dữ liệu---> 
<?php
if (mysqli_num_rows($query) > 0) {
?>
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Full name</th>
      <th>Address</th>
      <th>Avatar</th>
      <th>Tác vụ</th>
    </tr>
  </thead>
  <tbody class="danhsach">
<?php
    $i=0;
    while($row = mysqli_fetch_array($query)) {
?>
 
    <tr>     
      <td><?php echo $row["fullname"] ?></td>
      <td><?php echo $row["address"] ?></td>
      <td class="img">
        <img src="upload/<?php echo $row["avatar"] ?>">
      </td>
      <td style="text-align: center;">
        <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#edit<?php echo $row['id'] ?>">
             sửa
        </button>
        <a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Xóa</a>
      </td>
    </tr>  
 
  <!--form edit--->
<div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="edit.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="id" hidden value="<?php echo $row['id'] ?>">
        <div class="mb-4">
            <label>Họ tên</label>
            <input type="text" id="form1Example1" class="form-control" value="<?php echo $row['fullname'] ?>" name="txt_name" />
        </div>
        <div class="mb-4">
            <label>Địa chỉ</label>
            <input type="text" id="form1Example2" class="form-control" value="<?php echo $row['address'] ?>" name="txt_add" />
        </div>
        <div class="mb-4">
            <label>Ảnh đại diện</label>
            <input type="file" id="form1Example2" class="form-control" name="file" required/>
        </div>
        <center><button type="submit" name="btn_capnhat" class="btn btn-primary">Update</button></center>
       
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <?php
$i++;
}

?>
 </tbody>
</table>
 <?php
}
else{
    echo "Không có dữ liệu";
}

?>
<?php
require("connect.php");
if(isset($_POST['delete']))
{
    $id = $_POST['id'];
    $query = "DELETE FROM quan16 WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert(Xóa dữ liệu thành công "); </script>';
        header("location:index.php");
    }
    else
    {
        echo '<script> alert("Xóa dữ liệu không thành công"); </script>';
    }
}

?>
<!-- MDB -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"
></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.timkiem').keyup(function(){
            var txt = $('.timkiem').val();
            $.post('search.php', {data: txt}, function(data){
                $('.danhsach').html(data);
            })
        })
    })
</script>
</body>
</html>
