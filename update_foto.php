<?php
    include "koneksi.php";
    session_start();

    if(isset($_POST['edit'])){
        $fotoid=$_POST['fotoid'];
        $judulfoto=$_POST['judulfoto'];
        $deskripsifoto=$_POST['deskripsifoto'];
        $albumid=$_POST['albumid'];
        $tanggalunggah=date("Y-m-d");
        $userid=$_SESSION['userid'];
        $foto = $_FILES['lokasifile']['name'];
        $tmp = $_FILES['lokasifile']['tmp_name'];
        $lokasi= 'gambar/';
        $namafoto = rand().'_'.$foto;
    
        if($foto == null){
            $sql = mysqli_query($conn, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', 
            tanggalunggah='$tanggalunggah', albumid='$albumid' where fotoid='$fotoid'");
        }else{
            $query = mysqli_query($conn, "SELECT * FROM foto where fotoid='$fotoid'");
            $data = mysqli_fetch_array($query);
            if (is_file('gambar/'.$data['lokasifile'])){
                unlink('gambar/'.$data['lokasifile']);
            }
            move_uploaded_file($tmp, $lokasi.$namafoto);
            $sql = mysqli_query($conn, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', 
            tanggalunggah='$tanggalunggah', lokasifile='$namafoto', albumid='$albumid' where fotoid='$fotoid'");
            }
        }header("location:foto.php");
?>