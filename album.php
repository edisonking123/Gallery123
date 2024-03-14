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
    <title>Halaman Album</title>
    <link rel="stylesheet" href="css/stylealbum.css">
    <link rel="stylesheet" href="stylemu.css">
    <style>
        .isi{
            position: relative;
            top:100px;
        }
        .konten{
    position: absolute;
    left:0px;
  }
  .user-img{
 
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin: 15% 45%;
  }
  #photo{
    width: 80px;
    height: 80px;
    border-radius: 50%;
  }
  #file{
    display: none;
  }
  #uploadbtn{
    position: absolute;
    top:4px;
 right: 0px;
    height: 30px;
    width: 30px;
    padding: 6px 6px;
    border-radius: 50%;
    cursor: pointer;
    color: #ffffff;
    transform: translateX(-90%);
    background-color: #000000;
    box-shadow: 2px 4px 4px rgb(0, 0, 0 ,0.644);
    margin-top: 60px;
  }
    </style>
</head>
<body>
    <div class="main">
        <div class="icon">
            <h2 class="logo">E_King<a href="profil.html">👑</a></h2> <h1><center>My Album</center></h1>
            <nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="cetakalbum.php">Print</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
    </div>
    </div>
    <div class="konten">
    <div class="user-img">
        <img src="ini.jpg" id="photo">
        <input type="file" id="file">
        <label for="file" id="uploadbtn"></label><i class="fa-camera"></i></label>
        <p><b><?=$_SESSION['namalengkap']?></b></p>
        <p><B><a href="bio.php">Profil</a></B></p>
        <p><b><a href="postingnya.php">Posting</a></b></p>
        <p><b><a href="foto.php">MyPicture</a></b></p>
    </div>
</div>



   <center>
<div class="isi">
    <form action="tambah_album.php" method="post">
     
                    <tr>
                <td>Nama Album</td>
                &ensp;<td><input type="text" name="namaalbum"></td>
            </tr>
           
            <br>
            <tr>
                <td>Deskripsi</td>
                &ensp; &emsp;  <td><input type="text" name="deskripsi"></td>
            </tr>
            <br>
          
            <tr>
                <td></td>
                &ensp; &ensp;&ensp;&ensp;   &ensp;&emsp; &ensp;&emsp; &ensp;<td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
   
<nav>
    <br>
    <br>
    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal dibuat</th>
            <th>Aksi</th>
        </tr>
    
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from album where userid='$userid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['albumid']?></td>
                    <td><?=$data['namaalbum']?></td>
                    <td><?=$data['deskripsi']?></td>
                    <td><?=$data['tanggaldibuat']?></td>
                    <td>
                        <a href="hapus_album.php?albumid=<?=$data['albumid']?>">Hapus</a>
                        <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
    </nav>
    </div>
    </div>
    <!--CSS Spinner-->
<div class="spinner-wrapper">
<div class="spinner"></div>
</div>
    <br>
    <br>
    <br>
    <br>
    <small>
            <buttom>

        </buttom>
    <small>
    </center>
    <script>
$(document).ready(function() {
//Preloader
preloaderFadeOutTime = 500;
function hidePreloader() {
var preloader = $('.spinner-wrapper');
preloader.fadeOut(preloaderFadeOutTime);
}
hidePreloader();
});
</script>   
</body>
</html>