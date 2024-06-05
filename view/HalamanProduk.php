<?php
include '../model/database.php';
$db = new database();
$order = 'nama_produk';
$opt = 'ASC';
$key = '';
if(isset($_POST['Z-A'])){
	$order = 'nama_produk';
    $opt = 'DESC';
}
if(isset($_POST['A-Z'])){
	$order = 'nama_produk';
    $opt = 'ASC';
}
if(isset($_POST['murah'])){
	$order = 'harga';
    $opt = 'ASC';
}
if(isset($_POST['mahal'])){
	$order = 'harga';
    $opt = 'DESC';
}
if(isset($_POST['All'])){
	$order = 'nama_produk';
    $opt = 'ASC';
    $key = ''; 
}
if(isset($_POST['cari'])){
    $key = $_POST['cari']; 
}

if(isset($_POST['tersedia'])){
    $query = $db->tampil_data_produk_all_tersedia($key,$order,$opt);
}else{
    $query = $db->tampil_data_produk_all($key,$order,$opt);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_produk.css">
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <img class="img" src="images/logo.png" alt="Logo kue syifa">
            <img onclick="home()" class="img_toko" src="images/toko.png" alt="Kue syifa">
        </div>
        <div class="wrap">
            <form method="POST">
            <div class="search">
                <input type="text" class="searchTerm" name='cari' placeholder="Search">
                <button type="submit" class="searchButton">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                </form>
            </div>
            <a class="cart-s" href="HalamanPemesanan.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
        <!-- <div class="wrap">
            <div class="input-box">
            <span class="prefix"><i class="fa fa-search"></i></span>
            <input type="tel" placeholder="Search...."/>
            </div>
        </div> -->
    </div>

    <div class="container">
        <div id="filter" class="button-group d-flex flex-row-reverse">
            <form method="POST">
            <input type="submit" class="btn is-checked sort" name="tersedia" value="Tersedia">
            </form>
            <form method="POST">
            <input type="submit" class="btn is-checked sort" name="murah" value="Paling murah">
            </form>
            <form method="POST">
            <input type="submit" class="btn is-checked sort" name="mahal" value="Paling mahal">
            </form>
            <form method="POST">
            <input type="submit" class="btn is-checked sort" name="Z-A" value="Z-A">
            </form>
            <form method="POST">
            <input type="submit" class="btn is-checked sort" name="A-Z" value="A-Z">
            </form>
            <form method="POST">
            <input type="submit" class="btn is-checked sort" name="All" value="All">
            </form>
        </div>
        <br>
        <div class="grid">
            <?php
            $i = 0;
                    foreach ($query as $x){
                        $i = 1;
                        if ($x['persediaan'] == 'Tersedia') {

                        
                ?>
            <div class="col mx-1">
                <div class="data-produk">               
                     <a href="HalamanDeskripsi.php?id=<?=$x['id_produk']?>"><img class="img-fluid" src="<?=$x['gambar']?>" alt=""></a>
                    <a style="color:black;" href="HalamanDeskripsi.php?id=<?=$x['id_produk']?>">
                        <p class="text-center"><b><?=$x['nama_produk']?></b></p>
                    </a>
                    <p class="text-center"><?="Rp.".number_format($x['harga'],0,",",".")?></p>
                    </div>  
                </div>
            <?php
                    }else{

                ?>
                <div class="col mx-1">
                <div class="data-produk disable">               
                     <a href="HalamanDeskripsi.php?id=<?=$x['id_produk']?>"><img class="img-fluid" style="filter: grayscale(100%);" src="<?=$x['gambar']?>" alt=""></a>
                    <a style="color:black;" href="HalamanDeskripsi.php?id=<?=$x['id_produk']?>">
                        <p class="text-center"><b><?=$x['nama_produk']?></b></p>
                    </a>
                    <p class="text-center">Tidak tersedia</p>
                    </div>  
                </div>
                <?php
                   }
                }
                ?>
        </div>
        <?php
            if ($i == 0) {
                     echo "<h5 class='text-center'><b>Produk tidak ditemukan</b></h5><br>";                    
                        }
            ?>
        
    </div>

    <div class="footer-produk">
        <img src="images/footer.png" alt="">
        <hr
            style="border-top: 1.5px solid #333; width:20%; margin-left:auto !important; margin-right:auto !important;" />
        <b style="font-family: 'Poppins';font-style: normal;font-size:20px;color: #585858;">Store & Delivery</b>
        <p style="color: #585858;">Monday - Sunday 08.00 - 21.00</p>
        <br>
        <a class="btn btn-outline" href="https://linktr.ee/kuesyifa" target="_blank">CONTACT US</a>
        <br><br><br>
        <b style="color: #585858;">Peringatan</b>
        <p style="color: #585858;">Tidak menerima pesanan untuk Ulang tahun, anniversary, dan segala acara yang bertentangan dengan ajaran
            islam.</p>
        <br>
        <hr
            style="border-top: 1.5px solid black; width:90%; margin-left:auto !important; margin-right:auto !important;" />
    </div>

    <script>
        function link() {
            window.location.href = "HalamanDeskripsi.php?id=<?=$x['id_produk']?>";
        }

        function home() {
            window.location.href = "index.php";
        }
    </script>

</body>
</html>