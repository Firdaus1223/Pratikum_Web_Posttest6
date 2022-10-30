<?php
include 'koneksi.php';

  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT * FROM pemesanan WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
  <link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>pemesanan</title>
    <style type="text/css">
     * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: black;
      }
    button {
      display: block;
      background-color: #38b673;
      border: 0;
      font-weight: bold;
      font-size: 14px;
      color: #FFFFFF;
      cursor: pointer;
      width: 150px;
      height: 25px;
      margin-top: 15px;
    }
    button:hover{
      background-color: #32a367;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: black;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit Pesan<?php echo $data['nama']; ?>n</h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Nama</label>
          <input type="text" name="nama" value="<?php echo $data['nama']; ?>" autofocus="" required="" />
        </div>
        <div>
         <label  for="nama_makanan">Nama Makanan</label>
        <select class = "option" type="text" name="nama_makanan" id="nama_makanan">
        <option value="pilih">-Pilih Makanan-</option>
        <option value="nasi-kuning">Nasi Kuning</option>
        <option value="nasi-bekepor">Nasi Bakepor</option>
        <option value="sate-payau">Sate Payau</option>
        <option value="sate-ayam">Sate Ayam</option>
        <option value="sate-kambing">Sate Kambing</option>
        <option value="bakso-gresik">Bakso Gresik</option>
        </select>
<br>
        </div>
        <div>
          <label>Jumlah</label>
         <input type="text" name="jumlah" value="<?php echo $data['jumlah']; ?>" />
        </div>
        <div>
          <label>Alamat</label>
         <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" />
        </div>
        <div>
          <label>Email</label>
         <input type="text" name="email" value="<?php echo $data['email']; ?>" />
        </div>
        <div>
          <label>No telp</label>
         <input type="text" name="notelp" required=""value="<?php echo $data['notelp']; ?>" />
        </div>
        <div>
          <label>Voucher</label>
          <img src="gambar/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="foto" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>