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
    <title>Halaman Foto</title>
    
    <link rel="stylesheet" href="css/stylealbum.css">
    <link rel="stylesheet" href="stylemu.css">
    <style>
        table{
            width: 50%;
            border-collapse:;
            margin_bottom: 20px;

        }
        th, td{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th{
            background-color: grey;
        }
        footer{
    background-color: #111;
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

<br>
<br>
    <h1><center>Halaman foto</center></h1>
    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
       <center>
        <br>
        <br>
    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Disukai</th>
            <th>Di Komentari</th>
    
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['fotoid']?></td>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
                        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                    </td>
                    <td><?=$data['namaalbum']?></td>
                    <td>
                        <?php
                            $fotoid=$data['fotoid'];
                            $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                            echo mysqli_num_rows($sql2);
                        ?>
                    </td>
                    <td>
                <?php
                       $fotoid=$data['fotoid'];
                       $sql2=mysqli_query($conn,"select * from komentarfoto where fotoid='$fotoid'"); 
                     
                    ?>
                    <?php echo mysqli_num_rows($sql2)?>
                </td>
                  
                </tr>
        <?php
            }
        ?>
    </table>
        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2024; Disigned By <span class="designer">Edison King</span></p>
        </div>
        </center>
     
    </div>
    <script type="text/javascript">
		window.print();
	</script>
</body>
</html>