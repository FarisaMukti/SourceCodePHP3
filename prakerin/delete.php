<?php
    //include database connection file
    include_once("koneksi.php");

    //get id from URL to delete that user
    $id = $_GET['id'];

    // Delete user row from table based on given id
    $result = mysqli_query($mysqli, "DELETE FROM tabel_user WHERE id=$id");

    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:index.php");
?>