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
<h1><center>Halaman Album</center></h1>
<center>

    </center>
   <center>
<div class="isi">
   
     
   <br>
   <br>
<nav>
    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal dibuat</th>
           
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
            
                </tr>
        <?php
            }
        ?>
    </table>

    </nav>
    </div>
    </div>
    <script type="text/javascript">
		window.print();
	</script>
    <br>
    <br>
    <br>
    <br>
    <small>
            <buttom>

        </buttom>
    <small>
        <br>
        <br>
    <div class="footerBottom">
            <p>Copyright &copy;2024; Disigned By <span class="designer">Edison King</span></p>
        </div>
    </center>
</body>
</html>