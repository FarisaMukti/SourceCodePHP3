<html>
    <head>
        <title> Tambah User </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <a href="index.php"> Go To Home </a>
        <br/><br/>

        <form action="tambah.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><input type="text" name="mobile"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><input type="file" name="foto"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Kirim" value="Tambah"></td>
                </tr>
            </table>
        </form>

        <?php

        //mengecek saat data dikirim dengan nama variable dan nama yang ada di database
        if(isset($_POST['Kirim'])) {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $alamat = $_POST['alamat'];

            //variabel $foto yang memiliki nilai foto dan nama foto untuk menyimpan file foto dan nama foto
            $foto = $_FILES['foto']['name'];
            //$folderfoto merupakan nama variabel yang memiliki nilai yaitu gambar
            $folderFoto="gambar";
            //jika dalam variabel $folderfoto adalah bukan direktori/folder yang bernama gambar, maka :
            if(!is_dir($folderFoto));
            mkdir($folderFoto);     
            $fileTujuanFoto = $folderFoto."/".$foto;    

            //Cek File
            if (strlen($foto)>0) {
                if (is_uploaded_file(@$_FILES['foto']['tmp_name'])) {
                    move_uploaded_file (@$_FILES['foto']['tmp_name'], $fileTujuanFoto);
                }
            }

        //memanggil file koneksi.php agar dapat terhubung antara databse dan file
            include_once("koneksi.php");

        //menambah user data ke database yaitu table_user dengan perintah sql
            $result = mysqli_query($mysqli, "INSERT INTO tabel_user(nama,email,mobile,alamat,foto) VALUES('$nama','$email','$mobile','$alamat','$foto')");

        //menampilkan jika data user telah ditambahkan
            echo "Biodata user telah ditambahkan, Terimakasih. 
            <a href='index.php'> Lihat Data User </a>";
        }
        ?>

    </body>
</html>