<?php
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $keterangan = $_POST['keterangan'];
  $foto = $_FILES['foto'];
  $namaFoto = $_FILES['foto']['name'];
  $folder = '../foto/';
  $folder = $folder . basename($namaFoto);

  if (move_uploaded_file($_FILES['foto']['tmp_name'], $folder)) {
    rename("../foto/$namaFoto", "../foto/$namaFoto");
    $q = mysqli_query($koneksi, 
    "insert into project values (NULL, '$nama', '$keterangan', '$namaFoto')"
    );
  }
}
?>
<div class="container-fluid px-2 px-md-4">
<div class="card card-body min-height-400 border-radius-xl mt-4">
<div class="row">
  <div class="col-md-6">
    <h1>Tambah Project</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>NAMA</label>
        <input type="text" name="nama" class="form-control">
      </div>
      <div class="form-group">
        <label>UPLOAD FOTO</label>
        <input type="file" name="foto" class="form-control">
      </div>
      <div class="form-group">
        <label>KETERANGAN</label>
        <textarea name="keterangan" cols="30" rows="3" class="form-control"></textarea>
      </div>
      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <a href="?menu=project" class="btn btn-danger">Kembali</a>
    </form>
  </div>
</div>
</div>
</div>