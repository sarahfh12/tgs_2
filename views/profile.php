<?php
// ACTION UNTUK MENGUBAH DATA
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $perusahaan = $_POST['perusahaan'];
  $jabatan = $_POST['jabatan'];
  $foto = $_POST['foto'];


  if(empty($foto)) {
    $simpan = mysqli_query($koneksi, 
    "update user set nama='$nama', perusahaan='$perusahaan', jabatan='$jabatan' where id=1"
    );
  } else {
    $simpan = mysqli_query($koneksi, 
    "update user set nama='$nama', perusahaan='$perusahaan', jabatan='$jabatan',
    foto='$foto' where id=1"
    );
  }

  if($simpan) {
    $pesan = "<div class='alert alert-success'>Berhasil diperbaharui</div>";
  } else {
    $pesan = "<div class='alert alert-danger'>Terjadi kesalahan</div>";
  }
}

// ACTION UNTUK NGAMBIL DATA SAAT INI
$query = mysqli_query($koneksi, "SELECT * FROM `user`");
$data = mysqli_fetch_assoc($query);
?>

<div class="container-fluid px-2 px-md-4">
<div class="card card-body min-height-400 border-radius-xl mt-4">
<div class="row mb-5">
  <div class="col-md-12">
    <h1>Update Profile</h1>
    <div class="row">
      <div class="col-md-6">
        <?=@$pesan?>
        <form action="" method="post">
          <div class="form-group">
            <label class=""for="">NAMA LENGKAP</label>
            <input name="nama" type="text" value="<?=$data['nama']?>" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label for="">JABATAN</label>
            <input name="jabatan" type="text" value="<?=$data['jabatan']?>" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label for="">PERUSAHAAN</label>
            <input name="perusahaan" type="text" value="<?=$data['perusahaan']?>" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label for="">FOTO</label>
            <img src="<?=$data['foto']?>" width="100" style="border-radius:50%">
            <input name="foto" type="text" placeholder="paste URL foto" class="form-control">
          </div>
          <button type="submit" class="btn btn-danger" name="simpan">SIMPAN</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>

