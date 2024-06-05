<?php
include '../model/database.php';
$db = new database();
session_start();
        if (!isset($_SESSION['login'])) {
            header("location:HalamanLoginAdmin.php");
    }
$id = $_GET['id'];
foreach($db->tampil_edit('produk','id_produk',$id) as $x){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .tombol {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .tombol .btn {
            display: flex;
            justify-content: center;
            flex-basis: 51%;
        }
    </style>
</head>

<body style="background:#f2f2f2;">
    <div class="container">
        <h1 class="text-center"><b>Data Produk</b></h1>
        <hr>
        <br>

        <div class="row">
            <div class="col-5 text-center">
                <img width="380px" src="<?=$x['gambar']?>" alt="">
            </div>
        <div class="col-6">
            <form method="POST" action="../controller/proses.php?aksi=update-produk&id=<?=$x['id_produk']?>" enctype="multipart/form-data">
            <div class="form-group">
                <label><b> Id Produk :</b></label>
                <input type="text" class="form-control" name="idBaru" value="<?=$x['id_produk']?>"disabled>
            </div>
            <br>
            <div class="form-group">
                <label><b> Nama Produk :</b></label>
                <input type="text" class="form-control" name="nama" value="<?=$x['nama_produk']?>">
            </div>
            <br>
            <div class="form-group">
                <label><b> Harga Produk :</b></label>
                <input type="text" class="form-control" name="harga" value="<?=$x['harga']?>">
            </div>
            <br>
            <div class="form-group">
                <label><b> Satuan Produk :</b></label>
                <input type="text" class="form-control" name="satuan" value="<?=$x['satuan']?>">
            </div>
            <br>
            <div class="form-group">
                <label><b>Ketersediaan Produk :</b></label><br>
                <?php
                            if ($x['persediaan'] == 'Tersedia') {
                        ?>
                <input type="radio" name="status" value="Tersedia" checked> Tersedia<br>
                <input type="radio" name="status" value="Tidak Tersedia"> Tidak Tersedia
                <?php
                            }else{
                        ?>
                <input type="radio" name="status" value="Tersedia"> Tersedia<br>
                <input type="radio" name="status" value="Tidak Tersedia" checked> Tidak Tersedia
                <?php
                            }
                        ?>
            </div>
            <br>
            <div class="form-group">
                <label><b>Rekomendasi:</b></label><br>
                <?php
                            if ($x['rekomendasi'] == 'Ya') {
                        ?>
                <input type="radio" name="rekom" value="Ya" checked>Ya<br>
                <input type="radio" name="rekom" value="Tidak">Tidak
                <?php
                            }else{
                        ?>
                <input type="radio" name="rekom" value="Ya">Ya<br>
                <input type="radio" name="rekom" value="Tidak" checked>Tidak
                <?php
                            }
                        ?>
            </div>
            <br>
            <div class="form-group">
                <label><b> Ganti Gambar :</b></label><br>
                <input class="form-control" type="file" name="gambarBaru"">
            </div>
            <br>
            <div class="form-group">
                <label><b> Deskripsi Produk :</b></label>
                <textarea class="form-control" rows="4" name="des"><?=$x['deskripsi']?></textarea>
            </div>
            <br>
            <div class="tombol">
                <input class="btn btn-success" type="submit" value="Simpan Perubahan">
                <a href="../controller/proses.php?aksi=hapus-produk&id=<?=$x['id_produk']?>"
                    class="btn btn-danger">Hapus Produk</a>
            </div>
            </form>
        </div>
    </div>
    <br><br>
    </div>
    <?php
}
?>
</body>

</html>