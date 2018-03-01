<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Latihan CRUD PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h2>CRUD</h2>
    <p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>

    <h3>Data Siswa</h3>

    <table cellpadding="5" cellspacing="0" border="1">
        <tr bgcolor="#CCCCCC">
            <th>No.</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Opsi</th>
        </tr>

        <?php
            include('koneksi.php'); //memasukan koneksi

            //query database dengan select tabel siswa yang diurutkan berdasarkan nis
            $query = mysql_query("SELECT * FROM siswa ORDER BY siswa_nis DESC") or die (mysql_error());

            if(mysql_num_rows($query) == 0){
                echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
            }else{
                $no = 1;
                while($data = mysql_fetch_assoc($query)){
                    echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$data['siswa_nis'].'</td>';
                        echo '<td>'.$data['siswa_nama'].'</td>';
                        echo '<td>'.$data['siswa_kelas'].'</td>';
                        echo '<td>'.$data['siswa_jurusan'].'</td>';
                        echo '<td><a href="update.php?id='.$data['siswa_id'].'">Edit</a> / <a href="hapus.php?id='.$data['siswa_id'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';
                    echo '</tr>';

                    $no++;
                }
            }
        ?>
</body>
</html>