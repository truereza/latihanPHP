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
    <p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>

    <h3>Edit Data Siswa</h3>

    <?php
        //proses mengambil data ke database untuk ditampilkan di form edit berdasarkan siswa_id yg didapatkan dari GET id -> edit.php?id=siswa_id
        include('koneksi.php');

        //membuat variabel $id yang nilainya adalah dari URL GET id -> edit.php?id=siswa_id
        $id = $_GET['id'];

        $show = mysql_query("SELECT * FROM siswa WHERE siswa_id='$id'");

        if(mysql_num_rows($show) == 0){
            echo '<script>window.history.back()</script>';
        }else{
            //mengambil data ke database yang nantinya akan ditampilkan di form edit
            $data = mysql_fetch_assoc($show);
        }
    ?>

    <form action="edit-proses.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- membuat inputan hidden dan nilainya adalah siswa_id -->
        <table cellpading="3" cellspacing="0">
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><input type="text" name="nis" value="<?php echo $data['siswa_nis'];?>" required></td> <!-- value diambil dari hasil query -->
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $data['siswa_nama'];?>" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <select name="kelas" required>
                        <option value="">Pilih Kelas</option>
                        <option value="X" <?php if($data['siswa_kelas'] == 'X'){echo 'selected';}?>>X</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                        <option value="XI" <?php if($data['siswa_kelas'] == 'XI'){echo 'selected';}?>>XI</option>
                        <option value="XII" <?php if($data['siswa_kelas'] == 'XII'){echo 'selected';}?>>XII</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                    <select name="jurusan" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="Rekayasa Perangkat Lunak" <?php if($data['siswa_jurusan'] == 'Rekayasa Perangkat Lunak'){echo 'selected';}?>>Rekayasa Perangkat Lunak</option>
                        <option value="Teknik Komputer dan Jaringan" <?php if($data['siswa_jurusan'] == 'Teknik Komputer dan Jaringan'){echo 'selected';}?>>Teknik Komputer dan Jaringan</option>
                        <option value="Multimedia" <?php if($data['siswa_jurusan'] == 'Multimedia'){echo 'selected';}?>>Multimedia</option>
                        <option value="Akutansi" <?php if($data['siswa_jurusan'] == 'Akutansi'){echo 'selected';}?>>Akutansi</option>
                    </select>
                </td>
             </tr>
             <tr>
                <td>&nbsp;</td>
                <td></td>
                <td><input type="submit" name="simpan" value"Simpan"</td>
             </tr>
        </table>
    </form>
</body>
</html>