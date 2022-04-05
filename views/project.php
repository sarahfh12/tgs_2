<?php
error_reporting(0);
if ($_GET['hapus']) {
  $id = $_GET['hapus'];
  $q = mysqli_query($koneksi, "delete from project where id_p=$id");
  
}
?>

<div class="container-fluid px-2 px-md-4">
<div class="card card-body min-height-400 border-radius-xl mt-4">
<div class="row">
  <div class="col-md-12">
    <h1>
      Project
      <a href="?menu=tambah-project" class="btn btn-primary">Tambah</a>
    </h1>
    <table class="table table-striped" id="">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="15%">FOTO</th>
          <th>NAMA</th>
          <th>KETERANGAN</th>
          <th width="20%">AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $q = mysqli_query($koneksi, "select * from project");
        while($data = mysqli_fetch_array($q)) {?>
        <tr>
          <td><?=$data['id_p']?></td>
          <td><img src="../foto/<?=$data['foto']?>" width="130px"></td>
          <td><?=$data['nama_p']?></td>
          <td><?=$data['ket']?></td>
          <td>
            <a href="?menu=ubah-project&id=<?=$data['id_p']?>" class="btn btn-info">Ubah</a>
            <a onclick="hapus(<?=$data['id_p']?>)" class="btn btn-danger">hapus</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  function hapus(id) {
    let h = confirm('Project akan dihapus!!');
    if(h) {
      location.href = "?menu=project&hapus="+id;
    }
  }
</script>
</div>
</div>