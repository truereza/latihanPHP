<?php
    if(isset($_POST['simpan'])){
        include('koneksi.php');
        
        $id         = $_POST['id'];
        $nis        = $_POST['nis'];
        $nama       = $_POST['nama'];
        $kelas      = $_POST['kelas'];
        $jurusan    = $_POST['jurusan'];

        $input = mysql_query("UPDATE siswa SET siswa_nis='$nis', siswa_nama='$nama', siswa_kelas='$kelas', siswa_jurusan='$jurusan' WHERE siswa_id='$id'") or die (mysql_error());

        if($input){
            echo 'Data Berhasil diupdate!';
            echo '<a href="update.php?id='.$id.'">Kembali</a>';
        }else {
            echo 'Data Gagal diperbaharui!';
            echo '<a href="update.php?id='.$id.'">Kembali</a>';
        }
    }else{
        echo '<script>window.history.back()</script>';
    }
?>