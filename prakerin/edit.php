<?php

//memanggil file koneksi.php agar dapat terhubung antara database dan file
    include_once("koneksi.php");

//mengecek jika form telah dikirim untuk user update, kemudian ngeredirect ke halaman index.php setelah di update
    if(isset($_POST['update']))
    {
        //inisialisasi variable
        $id = $_POST['id'];         //variable id yang ada di php yang memiliki nilai id didatabase
        $nama = $_POST['nama'];     //variable nama yang ada di php yang memiliki nilai nama didatabase
        $email = $_POST['email'];   //variable email yang ada di php yang memiliki nilai email didatabase
        $mobile = $_POST['mobile']; //variable mobile yang ada di php yang memiliki nilai mobile didatabase
        $alamat = $_POST['alamat']; //variable alamat yang ada di php yang memiliki nilai alamat didatabase

        //result merupakan variable yang memiliki nilai yaitu mysqli_query yang akan mengeksekusi perintah sql yaitu UPDATE table_user...dst
        $result = mysqli_query($mysqli, 
        "UPDATE tabel_user SET nama='$nama',
                               email='$email',
                               mobile='$mobile',
                               alamat='$alamat'
                            WHERE id=$id");
        
        //menampilkan halaman index.php ketika update telah berhasil
        header("Location:index.php");
    }
?>

<?php

//menampilkan data user di database
//membuat variable id yang memiliki nilai id dari database
    $id = $_GET['id'];

//variable result memiliki nilai yaitu akan memilih dari table_user sesuai dengan id yang dipilih
    $result = mysqli_query($mysqli,"SELECT * FROM tabel_user WHERE id = $id");

    while($user_data = mysqli_fetch_array($result))
    {
        $nama = $user_data['nama'];
        $email = $user_data['email'];
        $mobile = $user_data['mobile'];
        $alamat = $user_data['alamat'];
    }
?>

<html>
    <head>
        <title> Edit User Data </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <br>
        <a href="index.php"> Home </a><br/><br/>

        <form name="update_user" method="post" action="edit.php">
            <table border="0">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value=<?php echo $email;?>></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><input type="text" name="mobile" value=<?php echo $mobile;?>></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </body>
</html>