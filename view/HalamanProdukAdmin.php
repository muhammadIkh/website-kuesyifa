<?php
include '../model/database.php';
$db = new database();
session_start();
        if (!isset($_SESSION['login'])) {
            header("location:HalamanLoginAdmin.php");
    }
$key = "";
if(isset($_POST['cari'])){
	$key = $_POST['cari'];
}
if(isset($_POST['reset'])){
	$key = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Produk</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_produk.css">
    <link rel="stylesheet" href="css/pesan-admin.css">
    <link rel="stylesheet" href="css/produk-admin.css">
     <style>
        a:hover{
            color: white;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-1">
            <nav>
                <div><a href="HalamanPemesananAdmin.php"><i class="fa-solid fa-store"></i></a></div>
                 <div><a href="HalamanRiwayatAdmin.php"><i class="fa-solid fa-clock-rotate-left"></i></a></div>
                <div class="active"><a href="HalamanProdukAdmin.php" class="active"><i class="fa-solid fa-square-plus"></i></i></a></div>
                <div><a href="HalamanAkunAdmin.php"><i class="fa fa-user"></i></a></div>

            </nav>
        </div>
        <div class="col-1"></div>
        <div class="col-9">
            <br>
                <h1 class="text-center"><b>Daftar Produk</b></h1>
                <hr>
                <form method="post">
                 <div class="cari">
                    <input class="col-sm-3" type="text" name="cari" id="cari" placeholder="Search">
                    <input type="submit" value="Search">
                    <input type="submit" name="reset" value="Reset">
                </form>
            </div>
            <br>
            
                <div class="grid">
                    <?php
                    $i = 0;
                    foreach ($db->tampil_data_produk($key) as $x){
                        $i = 1;
                        if ($x['persediaan'] == 'Tersedia') {

                        
                ?>
            <div class="col mx-1">
                <div class="data-produk">               
                     <a href="HalamanEditProduk.php?id=<?=$x['id_produk']?>"><img class="img-fluid" src="<?=$x['gambar']?>" alt=""></a>
                    <a style="color:black;" href="HalamanEditProduk.php?id=<?=$x['id_produk']?>">
                        <p class="text-center"><b><?=$x['nama_produk']?></b></p>
                    </a>
                    </div>  
                </div>
            <?php
                    }else{

                ?>
                <div class="col mx-1">
                <div class="data-produk disable">               
                     <a href="HalamanEditProduk.php?id=<?=$x['id_produk']?>"><img class="img-fluid" style="filter: grayscale(100%);" src="<?=$x['gambar']?>" alt=""></a>
                    <a style="color:black;" href="HalamanEditProduk.php?id=<?=$x['id_produk']?>">
                        <p class="text-center"><b><?=$x['nama_produk']?></b></p>
                    </a>
                    </div>  
                </div>
                <?php
                   }
                }
                ?>
                </div>
                <?php
            if ($i == 0) {
                     echo "<br><h5 class='text-center'><b>Produk tidak ditemukan</b></h5><br>";                    
                        }
            ?>
                <br>
                <div class="text-center">
                <a class="btn" href="HalamanTambahProduk.php">Tambah</a>
                </div>
                <br>
                <br>
            </div>
    </div>
    
</body>
</html>