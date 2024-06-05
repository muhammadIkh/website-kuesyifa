<?php
class database{
    var $host = 'localhost';
    var $user = 'root';
    var $password = '';
    var $db = 'kue_syifa';
    var $con;

    function __construct(){
        $this->con = mysqli_connect($this->host,
        $this->user, $this->password, $this->db);
        mysqli_select_db($this->con, $this->db);
    }

    function tampil_data_pemesanan($key){
        $hasil = array();
        $data = mysqli_query($this->con, "SELECT * FROM pemesanan p inner join produk r on p"."."."id_produk=r"."."."id_produk WHERE pemesan like '%$key%' AND status='dipesan' OR status='dibayar' ORDER BY tanggal DESC");
        while($d = mysqli_fetch_array($data)){
            $hasil[]= $d;
        }
        return $hasil;
    }

    function tampil_data_riwayat($key){
        $hasil = array();
        $data = mysqli_query($this->con, "SELECT * FROM pemesanan p inner join produk r on p"."."."id_produk=r"."."."id_produk where tanggal like '%$key%' ORDER BY tanggal DESC");
        while($d = mysqli_fetch_array($data)){
            $hasil[]= $d;
        }
        return $hasil;
    }
    function tampil_data_produk($key){
        $hasil = array();
        $data = mysqli_query($this->con, "SELECT * FROM produk where nama_produk like '%$key%'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
    function tampil_data_admin(){
        $hasil = array();
        $data = mysqli_query($this->con, "SELECT * FROM `admin`");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
    function tampil_data_produk_random(){
        $hasil = array();
        $data = mysqli_query($this->con, "SELECT * FROM produk where persediaan='Tersedia' ORDER BY RAND() LIMIT 8");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
    function tampil_data_produk_all($key,$order,$opt){
        $hasil = array();
        $data = mysqli_query($this->con, "SELECT * FROM produk where nama_produk like '%$key%' order by $order $opt");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
    function tampil_data_produk_all_tersedia($key,$order,$opt){
        $hasil = array();
        $data = mysqli_query($this->con, "SELECT * FROM produk where nama_produk like '%$key%' and persediaan='Tersedia' order by $order $opt");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
    function tampil_data_produk_rekomendasi(){
        $hasil = array();
        $data = mysqli_query($this->con, "SELECT * FROM produk WHERE persediaan='Tersedia' AND rekomendasi='Ya'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
    function tampil_edit($tabel,$nama,$id){
        $hasil = array();
        $data = mysqli_query($this->con, "SELECT * FROM `$tabel` where $nama='$id'");
        while($d = mysqli_fetch_array($data)){
            $hasil[]=$d;
        }
        return $hasil;
    }
     function hapus_data($tabel,$nama,$id){
        mysqli_query($this->con, 
        "DELETE FROM $tabel WHERE $nama='$id'");
    }
    function input_admin($username,$password){
        mysqli_query($this->con, 
        "INSERT INTO `admin` VALUES('','$username','$password')");
    }
    function ubah_admin($username,$password,$id){
        mysqli_query($this->con, 
        "UPDATE `admin` SET `username`='$username',`password`='$password' WHERE id_admin='$id'");
    }
    function input_produk($id,$nama,$harga,$satuan,$des,$gambar,$status,$rekom){
        $gambarurl =  mysqli_real_escape_string($this->con,'images/'.$gambar);
        mysqli_query($this->con, 
        "INSERT INTO produk VALUES('$id','$nama',$harga,'$satuan','$des','$gambarurl','$status','$rekom')");
    }
    function input_pesan($pemesan,$alamat,$hp,$banyak,$total,$catatan,$id){
        mysqli_query($this->con, 
        "INSERT INTO pemesanan VALUES(null,curdate(),'$pemesan','$alamat','$hp','$banyak','$total','$catatan','$id','dipesan')");
    }
    function ubah_produk($id,$nama,$harga,$satuan,$des,$status,$rekom){
        mysqli_query($this->con, 
        "UPDATE produk SET nama_produk='$nama',harga=$harga,satuan='$satuan',deskripsi='$des',persediaan='$status',rekomendasi='$rekom' WHERE id_produk='$id'");
    }
    function ubah_produk_gambar($id,$nama,$harga,$satuan,$des,$gambar,$status,$rekom){
        $gambarurl =  mysqli_real_escape_string($this->con,'images/'.$gambar);
        mysqli_query($this->con, 
        "UPDATE produk SET nama_produk='$nama',harga=$harga,satuan='$satuan',deskripsi='$des',gambar='$gambarurl',persediaan='$status',rekomendasi='$rekom' WHERE id_produk='$id'");
    }
   function ubah_status($id,$status){
        mysqli_query($this->con, 
        "UPDATE pemesanan SET status='$status' WHERE no_pemesanan='$id'");
    }
}
?>