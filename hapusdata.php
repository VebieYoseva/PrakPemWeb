<?php

$host = "localhost";
$username = "root";
$password = ""; 
$database = "tugasdatamahasiswa";
$koneksi = new mysqli('localhost', 'root', '', 'tugasdatamahasiswa');


if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $query_hapus = "DELETE FROM datamhs WHERE nim = '$nim'";
    
    if ($koneksi->query($query_hapus) === TRUE) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "Error: " . $query_hapus . "<br>" . $koneksi->error;
    }
}
?>
