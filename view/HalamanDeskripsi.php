<?php
include '../model/database.php';
$db = new database();
$id = $_GET['id'];
session_start();
if(isset($_SESSION['cart']) && isset($_SESSION['total'])){
    $item_id = array_column($_SESSION['cart'],'id_produk');
    
}else{

}

foreach($db->tampil_edit('produk','id_produk',$id) as $x){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.2">
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-des.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="navbar">
        <div class="logo">
            <img class="img" src="images/logo.png" alt="Logo kue syifa">
            <img onclick="home()" class="img_toko" src="images/toko.png" alt="Kue syifa">
        </div>
         <div class="wrapc">
            <a class="cart-s" href="HalamanPemesanan.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
        <!-- <div class="wrap">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Search....">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div> -->
        <!-- <div class="wrap">
            <div class="input-box">
            <span class="prefix"><i class="fa fa-search"></i></span>
            <input type="tel" placeholder="Search...."/>
            </div>
        </div> -->
    </div>

    <div class="wrapper">
        <div class="row">
            <div class="col-3">
                <?php
                    if($x['persediaan'] == 'Tidak Tersedia'){
                ?>
                <img width="300px" src="<?=$x['gambar']?>" style="filter: grayscale(100%);" alt="">
                <?php
                    }else{
                ?>
                <img width="300px" src="<?=$x['gambar']?>" alt="">
                <?php
                    }   
                ?>
            </div>
            <div class="col-5">
                <div class="nama-produk">
                <h2><b><?=$x['nama_produk']?></b></h2>
                </div>
                <br>
                <div class="ket">
                <p><?=$x['deskripsi']?></p>
                </div>
                <div class="nama-harga">
                <h2><b><?="Rp.".number_format($x['harga'],0,",",".")?></b></h2><h1>/</h1><b><?=$x['satuan']?></b>
                </div>
            </div>
            <div class="col-4 text-center">
                <form method="POST" id="form-cart" action="../controller/proses.php?aksi=tambah-cart&id=<?=$id=$_GET['id'];?>">
                <?php
                    if($x['persediaan'] == 'Tidak Tersedia'){
                ?>
                <div class="pesan text-center d-flex align-items-center justify-content-center">
                   <h4>Produk tidak tersedia</h4>
                </div>
                <?php
                    }else{
                ?>
                <div class="pesan">
                    <div class="row justify-content-center">
                            <div class="tambah">
                                <a class="minus" href="">-</a>
                                <input form="form-cart" name="jumlah" type="text" class="form-control text-center jumlah" value="1" readonly="readonly">
                                <a class="plus" href="">+</a>
                            </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-7">
                            <input type="submit" name="cart" class="btn tombol cart" value="Tambah Keranjang">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-7">
                             <input type="submit" name="pesan" class="btn tombol" value="Pesan Sekarang">
                        </div>
                    </div>
                </div>
                <?php
                    }   
                ?>
                </form>
            </div>
        </div>
        <div class="explore">
            <h4>Explore more</h4>
            <br>
            <div class="owl-carousel">
                <?php
                foreach($db->tampil_data_produk_random() as $a){
                ?>
                <div class="item">
                    <div>
                        <a href="HalamanDeskripsi.php?id=<?=$a['id_produk']?>"><img height="230px" src="<?=$a['gambar']?>" alt=""></a>
                    </div>
                    <br>
                    <div class="nama text-center">
                         <a href="HalamanDeskripsi.php?id=<?=$a['id_produk']?>"><b><?=$a['nama_produk']?></b></a>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
        }
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/index.js"></script>
    <script>
        function link() {
    window.location.href = "HalamanDeskripsi.php?id=<?=$a['id_produk']?>";
}
function home() {
            window.location.href = "index.php";
        }
    </script>
</body>

</html>