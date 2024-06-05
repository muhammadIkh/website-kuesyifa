<?php
session_start();
        if (!isset($_SESSION['login'])) {
            header("location:HalamanLoginAdmin.php");
    }
include '../model/database.php';
$db = new database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">
    <title>Ganti Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        form{
            margin: 0 20%;
        }
        .tombol {
            display: flex;
            justify-content: center;
        }

        .tombol .btn {
            width: 50%;
        }
    </style>
</head>

<body style="background:#f2f2f2;">
    <div class="container">
        <br>
        <h1 class="text-center"><b>Kelola Admin</b></h1>
        <hr>
        <br>
        <form action="../controller/proses.php?aksi=update-admin" method="POST" enctype="multipart/form-data">
             <?php
                foreach($db->tampil_edit('admin','id_admin',$_SESSION['id']) as $a){
                ?>
            <div class="form-group">
                <label><b> Username :</b></label>
                <input type="text" class="form-control" name="username" value="<?=$a['username']?>">
            </div>
            <br>
            <div class="form-group">
                <label><b> New Password :</b></label>
                <input type="text" class="form-control" name="password">
            </div>
            <br>
            <?php
                }
            ?> 
            <div class="tombol">
                <input class="btn btn-success" type="submit" value="Ubah Password">
            </div>
        </form>
        <br><br>
    </div>
</body>

</html>