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
   
    
    
<link rel="stylesheet" href="stylemu.css">
    <link rel="stylesheet" href="css/stylealbum.css">

    
    <style>
    </style>
</head>
<body>
    <h1><center>Halaman Branda</center></h1>
    <center>
    <div class="main">
        <div class="icon">
            
            </div>
    </div>
    <br>
    <br>
    <nav>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Uploader</th>
      
            <th>like</th>
            <th>Komentar</th>
        </tr>
        <?php
            include "koneksi.php";
            $sql=mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['fotoid']?></td>
                <td><?=$data['judulfoto']?></td>
                <td><?=$data['deskripsifoto']?></td>
                <td>
                    <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                </td>
                <td><?=$data['namalengkap']?></td>
        
                <td>
                <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                        
                    ?>
                
            </span>
           <?php
            echo mysqli_num_rows($sql2);
           ?>
          </a>
            </td>
<td>
                <?php
                       $fotoid=$data['fotoid'];
                       $sql2=mysqli_query($conn,"select * from komentarfoto where fotoid='$fotoid'"); 
                     
                    ?>
                    komentar(<?php echo mysqli_num_rows($sql2)?>)</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    <div class="footerCointainer">
        <div class="socialIcon">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>
        <div class="footernav">
   
        </div>
        <br>
        <br>    
        <div class="footerBottom">
            <p>Copyright &copy;2024; Disigned By <span class="designer">Edison King</span></p>
        </div>
    </div>
    <script type="text/javascript">
		window.print();
	</script>
    <script src="main.js" crossorigin=""></script>
</body>
</html>

