<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Posting</title>
    <link rel="stylesheet" href="css/stylealbum.css">
    <link rel="stylesheet" href="stylemu.css">
    <style>
      .konten{
        position: absolute;
        left:500px;
        top:200px;
      }
    </style>
</head>
<body>
<div class="main">
        <div class="icon">
            <h2 class="logo">E_King<a href="profil.html">👑</a></h2> <h1><center>Posting</center></h1>
         
    </div>
    </div>

    <marquee><p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p></marquee>
  
  
    <br>
<div class="konten">
    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
          
                Judul
                &emsp; &ensp; <input type="text" name="judulfoto">
        <br>
        <br>
            
                Deskripsi
                &ensp;<input type="text" name="deskripsifoto">
<br>
<br>
                Lokasi File
                <input type="file" name="lokasifile">
    <br>
    <br>
                Album
          
                &emsp; &ensp;  <select name="albumid">
                    <?php
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    <br>
            <br>
            &emsp; &ensp;  &emsp; &ensp;  &ensp;  <input type="submit" value="Posting">
        </table>
    </form>
    </div>
    <center>

        </div>
        </center>
     
    </div>
</body>
</html>