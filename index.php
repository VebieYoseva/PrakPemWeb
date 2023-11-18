<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style7.css">
</head>
<body>
    <div class="bingkai">
        <h1>Data Mahasiswa</h1>

        <form action="" method="post">
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="prodi" placeholder="Program Studi" required>
            <button type="submit" name="tambah">Tambahkan Data</button>
        </form>

        <div class="message">
            <?php
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "tugasdatamahasiswa";
            $koneksi = new mysqli($host, $username, $password, $database);

            if ($koneksi->connect_error) {
                die("Koneksi database gagal: " . $koneksi->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah'])) {
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $prodi = $_POST['prodi'];

                $query_tambah = "INSERT INTO datamhs (nim, nama, prodi) VALUES ('$nim', '$nama', '$prodi') 
                ON DUPLICATE KEY UPDATE nama = '$nama', prodi = '$prodi'";

                if ($koneksi->query($query_tambah) === TRUE) {
                    echo "Data mahasiswa berhasil ditambahkan.";
                } else {
                    echo "Error: " . $query_tambah . "<br>" . $koneksi->error;
                }
            }
            ?>
        </div>

        <?php
        $query_tampilkan = "SELECT * FROM datamhs";
        $result = $koneksi->query($query_tampilkan);

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>NIM</th><th>Nama</th><th>Program Studi</th><th>Aksi</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['nim']."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['prodi']."</td>";
                echo "<td><a href='editdata.php?nim=".$row['nim']."'>Edit</a> | <a href='hapusdata.php?nim=".$row['nim']."'>Hapus</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada data mahasiswa.</p>";
        }
        ?>

        <h2>Cari Mahasiswa berdasarkan Program Studi</h2>
        <form action="" method="get">
            <select name="prodi">
                <option value="">Pilih Program Studi</option>
                <?php
                $query_program_studi = "SELECT DISTINCT prodi FROM datamhs";
                $result_program_studi = $koneksi->query($query_program_studi);

                while ($row = $result_program_studi->fetch_assoc()) {
                    echo "<option value='" . $row['prodi'] . "'>" . $row['prodi'] . "</option>";
                }
                ?>
            </select>
            <button type="submit" name="cari">Cari</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cari']) && isset($_GET['prodi'])) {
            $prodi = $koneksi->real_escape_string($_GET['prodi']);

            $query_cari = "SELECT * FROM datamhs WHERE prodi = '$prodi'";
            $result_cari = $koneksi->query($query_cari);

            if ($result_cari->num_rows > 0) {
                echo "<h2>Hasil Pencarian</h2>";
                echo "<table border='1'>";
                echo "<tr><th>NIM</th><th>Nama</th><th>Program Studi</th><th>Aksi</th></tr>";
                while ($row = $result_cari->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['nim']."</td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['prodi']."</td>";
                    echo "<td><a href='editdata.php?nim=".$row['nim']."'>Edit</a> | <a href='hapusdata.php?nim=".$row['nim']."'>Hapus</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Tidak ditemukan data mahasiswa pada program studi '$prodi'.</p>";
            }

        }

        $koneksi->close();
        ?>
    </div>
</body>
</html>
