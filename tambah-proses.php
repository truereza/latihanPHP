<?php
    //cek jika tombol tambah di klik
    if(isset($_POST['tambah'])){

        include('koneksi.php');

        //jika data benar maka akan dilanjutkan proses
        $nis        = $_POST['nis'];
        $nama       = $_POST['nama'];
        $kelas      = $_POST['kelas'];
        $jurusan    = $_POST['jurusan'];

        //QUERY INSERT
        $input = mysql_query("INSERT INTO siswa VALUES(NULL,'$nis','$nama','$kelas','$jurusan')") or die (mysql_error());
        
        //CEK JIKA QUERY BERHASIL
        if($input){
            echo 'Data berhasil ditambahkan!';
            echo '<a href="tambah.php">Kembali</a>';
        }else{
            echo 'Gagal menambahkan data!';
            echo '<a href="tambah.php">Kembali</a>';
        }
    }else{ //jika tidak terdeteksi tombol tambah di klik
        //dikembalikan ke halaman tambah
        echo '<script>window.history.back()</script>';
    }
?>