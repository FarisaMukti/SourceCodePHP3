<?php
include_once("koneksi.php");
//memanggil file koneksi.php agar dapat terhubung antara database dan file

$hasil = mysqli_query($mysqli, "SELECT * FROM tabel_user ORDER BY id DESC");
//hasil merupakan nama variable yang memiliki nilai yaitu mysqli_query dimana mysqli query
//akan mengeksekusi perintah sql yaitu "SELECT*FROM user ORDER BY id DESC" user merupakan
//nama table yang ada di database.
?>

<html>
    <head>
        <title> HOMEPAGE </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="transparent">
    <br>
    <a href="tambah.php"> Tambah User Baru </a><br/><br/>
        <table class=table width='80%' border=1>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Alamat</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php
            while($user_data = mysqli_fetch_array($hasil)) {
                //while merupakan perulangan yang akan mengulang nama variable dari user_data dimana memiliki nilai yaitu variable hasil.
                echo "<tr>";
                echo "<td align='center'><img src='gambar/1.jpg".$user_data['foto']."' width='80' height='80'></td>";
                echo "<td>".$user_data['nama']. "</td>";   
                //user_data merupakan variable yang akan memanggil nama kolom yang ada didatabase yaitu nama
                echo "<td>".$user_data['email']. "</td>"; 
                //user_data merupakan variable yang akan memanggil nama kolom yang ada didatabase yaitu email
                echo "<td>".$user_data['mobile']. "</td>";  
                //user_data merupakan variable yang akan memanggil nama kolom yang ada didatabase yaitu mobile
                echo "<td>".$user_data['alamat']. "</td>";  
                //user_data merupakan variable yang akan memanggil nama kolom yang ada didatabase yaitu alamat
                echo "<td><a href='edit.php?id=$user_data[id]'> Edit </a></td>";
                echo "<td><a href='delete.php?id=$user_data[id]'> Hapus </a></td></tr>";
            }
            ?>
        
        </table>
      </div>
    </body>
</html>
