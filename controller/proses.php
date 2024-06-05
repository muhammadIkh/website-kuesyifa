<?php
include '../model/database.php';
$db = new database();
session_start();

$aksi = $_GET['aksi'];
if($aksi == 'tambah-produk'){
    //Upload File
    if ($_FILES['gambar']['name'] == '') {
        $db->input_produk($_POST['id'], $_POST['nama'], $_POST['harga'],$_POST['satuan'],$_POST['des'],'none.png',$_POST['status'],$_POST['rekom']);
                echo '<script language="javascript">';
                echo 'alert("Data berhasil ditambahkan");';
                echo 'window.location.href="../view/HalamanProdukAdmin.php";';
                echo '</script>';
    }else{
        $img_name = $_FILES['gambar']['name'];
	    $img_size = $_FILES['gambar']['size'];
	    $tmp_name = $_FILES['gambar']['tmp_name'];
	    $error = $_FILES['gambar']['error'];
        if ($img_size > 2000000) {
            echo '<script language="javascript">';
            echo 'alert("File terlalu besar Maksimal 2MB");';
            echo 'window.location.href="../view/HalamanTambahProduk.php";';
            echo '</script>';            
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
                $img_name_real = $_POST['id'].".png";
                $img_name = $_POST['id'].".".$img_ex_lc;
				$img_upload_path = '../view/images/'.$img_name_real;
				move_uploaded_file($tmp_name, $img_upload_path);
                $db->input_produk($_POST['id'], $_POST['nama'], $_POST['harga'],$_POST['satuan'],$_POST['des'],$img_name_real,$_POST['status'],$_POST['rekom']);
                echo '<script language="javascript">';
                echo 'alert("Data berhasil ditambahkan");';
                echo 'window.location.href="../view/HalamanProdukAdmin.php";';
                echo '</script>';                
			}else {
				echo '<script language="javascript">';
                echo 'alert("Format file salah. Hanya mendukung format JPG,JPEG,PNG");';
                echo 'window.location.href="../view/HalamanTambahProduk.php";';
                echo '</script>';               
			}
		}
    }
}else if($aksi == 'update-produk'){
   if ($_FILES['gambarBaru']['name'] == '') {
        $db->ubah_produk($_GET['id'], $_POST['nama'], $_POST['harga'],$_POST['satuan'],$_POST['des'],$_POST['status'],$_POST['rekom']);
                echo '<script language="javascript">';
                echo 'alert("Data berhasil diubah");';
                echo 'window.location.href="../view/HalamanProdukAdmin.php";';
                echo '</script>';
    }else{
        $img_name = $_FILES['gambarBaru']['name'];
	    $img_size = $_FILES['gambarBaru']['size'];
	    $tmp_name = $_FILES['gambarBaru']['tmp_name'];
        if ($img_size > 2000000) {
            echo '<script language="javascript">';
            echo 'alert("File terlalu besar Maksimal 2MB");';
            echo 'window.location.href="../view/HalamanProdukAdmin.php";';
            echo '</script>';            
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
                $img_name_real = $_GET['id'].".png";
                $img_name = $_GET['id'].".".$img_ex_lc;
				$img_upload_path = '../view/images/'.$img_name_real;
				move_uploaded_file($tmp_name, $img_upload_path);
                $db->ubah_produk_gambar($_GET['id'], $_POST['nama'], $_POST['harga'],$_POST['satuan'],$_POST['des'],$img_name_real,$_POST['status'],$_POST['rekom']);
                echo '<script language="javascript">';
                echo 'alert("Data Produk berhasil diubah");';
                echo 'window.location.href="../view/HalamanProdukAdmin.php";';
                echo '</script>';                
			}else {
				echo '<script language="javascript">';
                echo 'alert("Format file salah. Hanya mendukung format JPG,JPEG,PNG");';
                echo 'window.location.href="../view/HalamanProdukAdmin.php";';
                echo '</script>';               
			}
		}
    } 
}else if($aksi == 'hapus-produk'){
    $db->hapus_data('produk', 'id_produk',$_GET['id']);
    echo '<script language="javascript">';
    echo 'alert("Data berhasil dihapus");';
    echo 'window.location.href="../view/HalamanProdukAdmin.php";';
    echo '</script>';  
}elseif ($aksi == 'login') {
    $j = 0;
        foreach($db->tampil_data_admin() as $a){
            if ($_POST['username'] == $a['username'] && password_verify($_POST['password'],$a['password'])) {
                echo '<script language="javascript">';
                echo 'alert("Anda berhasil Login");';
                echo 'window.location.href="../view/HalamanPemesananAdmin.php";';
                $_SESSION['login'] = true;
                $_SESSION['id'] = $a['id_admin'];
                echo '</script>';
                $j = 1;
                break;      
            }
        }
        if ($j == 0) {
                echo '<script language="javascript">';
                echo 'alert("Data tidak ditemukan");';
                echo 'window.location.href="../view/HalamanLoginAdmin.php";';
                echo '</script>';
        }
}elseif ($aksi == 'logout') {
    unset($_SESSION["login"]);
    echo '<script language="javascript">';
                echo 'alert("Berhasil Logout");';
                echo 'window.location.href="../view/HalamanLoginAdmin.php";';
                echo '</script>';
} elseif ($aksi == 'tambah-admin') {
                $db->input_admin($_POST['username'], password_hash($_POST['password'],PASSWORD_DEFAULT));
                
                echo '<script language="javascript">';
                echo 'alert("Data berhasil ditambahkan");';
                echo 'window.location.href="../view/HalamanAkunAdmin.php";';
                echo '</script>';     
}elseif ($aksi == 'update-admin') {
                $db->ubah_admin($_POST['username'], password_hash($_POST['password'],PASSWORD_DEFAULT),$_SESSION['id']);
                echo '<script language="javascript">';
                echo 'alert("Data berhasil diubah");';
                echo 'window.location.href="../view/HalamanAkunAdmin.php";';
                echo '</script>';     
}elseif ($aksi == 'dibatalkan') {        
                echo '<script language="javascript">';
                echo 'alert("Pesanan dibatalkan");';
                echo 'window.location.href="../view/HalamanPemesananAdmin.php";';
                echo '</script>';
                $db->ubah_status($_GET['id'],$aksi);     
}elseif ($aksi == 'dipesan') {        
                echo '<script language="javascript">';
                echo 'alert("Status pesanan diubah menjadi dipesan");';
                echo 'window.location.href="../view/HalamanPemesananAdmin.php";';
                echo '</script>';
                $db->ubah_status($_GET['id'],$aksi);     
}elseif ($aksi == 'dibayar') {        
                echo '<script language="javascript">';
                echo 'alert("Status pesanan diubah menjadi dibayar");';
                echo 'window.location.href="../view/HalamanPemesananAdmin.php";';
                echo '</script>';
                $db->ubah_status($_GET['id'],$aksi);     
}elseif ($aksi == 'selesai') {        
                echo '<script language="javascript">';
                echo 'alert("Status pesanan diubah menjadi selesai");';
                echo 'window.location.href="../view/HalamanPemesananAdmin.php";';
                echo '</script>';
                $db->ubah_status($_GET['id'],$aksi);     
}elseif ($aksi == 'tambah-cart') {
   $id = $_GET['id'];
    if (isset($_SESSION['cart']) && isset($_SESSION['total'])) {
        $item_id = array_column($_SESSION['cart'],'id_produk');
        $banyak = array_column($_SESSION['total'],'banyak');
        if (in_array($id,$item_id)) {
            $index = array_search($id,$item_id);
            echo '<script language="javascript">';
            if (isset($_POST['pesan'])) {
                $banyak = array('banyak' => $_POST['jumlah']);
                $_SESSION['total'][$index] = $banyak;
                 echo 'window.location.href="../view/HalamanPemesanan.php";';
                 echo '</script>';
            }else {
                $banyak = array('banyak' => $_POST['jumlah']);
                $_SESSION['total'][$index] = $banyak;
                echo 'alert("Produk sudah ada didalam cart");';
                echo 'window.location.href="../view/HalamanProduk.php";';
                echo '</script>';
            }
            
        }else{
            $count = count($_SESSION['cart']);
            $item_id = array('id_produk' => $id);
            $_SESSION['cart'][$count] = $item_id;
            $count1 = count($_SESSION['total']);
            $banyak = array('banyak' => $_POST['jumlah']);
            $_SESSION['total'][$count1] = $banyak;
            echo '<script language="javascript">';
            if (isset($_POST['pesan'])) {
                 echo 'window.location.href="../view/HalamanPemesanan.php";';
                 echo '</script>';
            }else {
                echo 'alert("Produk berhasil ditambahkan");';
                echo 'window.location.href="../view/HalamanProduk.php";';
                echo '</script>';
            }
        }   
    }else{
        $item_id = array('id_produk' => $id);
        $_SESSION['cart'][0] = $item_id;  
        $banyak = array('banyak' => $_POST['jumlah']);
        $_SESSION['total'][0] = $banyak;  
        echo '<script language="javascript">';
         if (isset($_POST['pesan'])) {
                 echo 'window.location.href="../view/HalamanPemesanan.php";';
                 echo '</script>';
            }else {
                echo 'alert("Produk berhasil ditambahkan");';
                echo 'window.location.href="../view/HalamanProduk.php";';
                echo '</script>';
            }
    } 
}elseif ($aksi == 'hapus-cart') {
    foreach ($_SESSION['cart'] as $key=>$value) {
        if ($value['id_produk'] == $_GET['id']) {
            unset($_SESSION['cart'][$key]);
            unset($_SESSION['total'][$key]);
            array_values($_SESSION['cart']);
            array_values($_SESSION['total']);
            echo '<script language="javascript">';
    echo 'window.location.href="../view/HalamanPemesanan.php";';
    echo '</script>';
        }
    }
}elseif ($aksi=='input-pesan') {
    
    if (isset($_SESSION['cart']) && isset($_SESSION['total'])) {
        $total = 0;
        $item_id = array_column($_SESSION['cart'],'id_produk');
        $banyak = array_column($_SESSION['total'],'banyak');
        foreach (array_combine($item_id,$banyak) as $id => $ba) {
             foreach($db->tampil_edit('produk','id_produk',$id) as $a){
                $total = $total + ($ba*$a['harga']);
                $db->input_pesan($_POST['pemesan'],$_POST['alamat'],$_POST['hp'],$ba,($ba*$a['harga']),$_POST['catatan'],$id);
            }
                
        }
    echo '<script language="javascript">';
    echo 'alert("Pesanan ditambahkan");';
    echo 'window.location.href="../view/HalamanRedirect.php?total='.$total.'";';
    echo '</script>';
    unset($_SESSION["cart"]);
    unset($_SESSION["total"]);
    }else{
        echo '<script language="javascript">';
        echo 'alert("Pesanan anda kosong");';
        echo 'window.location.href="../view/HalamanPemesanan.php";';
        echo '</script>';
    }
}elseif ($aksi == 'batal-cart') {
    unset($_SESSION["cart"]);
    unset($_SESSION["total"]);
    echo '<script language="javascript">';
    echo 'window.location.href="../view/index.php";';
    echo '</script>';
}
?>