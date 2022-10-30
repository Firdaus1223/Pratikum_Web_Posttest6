<?php
include 'koneksi.php';

  $nama   = $_POST['nama'];
  $nama_makanan   = $_POST['nama_makanan'];
  $jumlah   = $_POST['jumlah'];
  $alamat   = $_POST['alamat'];
  $email   = $_POST['email'];
  $notelp   = $_POST['notelp'];
  $foto = $_FILES['foto']['name'];


if($foto != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); 
  $x = explode('.', $foto); 
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$foto; 
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); 
                  $query = "INSERT INTO pemesanan (nama, nama_makanan, jumlah, alamat,email, notelp, foto) VALUES ('$nama', '$nama_makanan', '$jumlah', '$alamat','$email','$notelp', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {     
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO pemesanan (nama_produk, deskripsi, harga_beli, harga_jual, foto) VALUES ('$nama', '$nama_makanan', '$jumlah', '$alamat','$email','$notelp', null)";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}
