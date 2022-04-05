<?php
error_reporting(0);
if ($_GET['hapus']) {
  $id = $_GET['hapus'];
  $q = mysqli_query($koneksi, "delete from contact where id_k=$id");
  
}
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Table Contact</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center table table-striped" id="">
                  <thead>
                    <tr>
                      <th width="5%">#</th>
                      <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">NAMA</th>
                      <th class=" text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">EMAIL</th>
                      <th class=" text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">PESAN</th>
                      <th class=" text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">TANGGAL</th>
                      <th class="text-secondary opacity-7 ps-2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $q = mysqli_query($koneksi, "select * from contact");
                    while($data = mysqli_fetch_array($q)) {?>
                    <tr>
                      <td><p class="d-flex flex-column"><?=$data['id_k']?></p></td>
                      <td>
                          <div class="d-flex flex-column justify-content-center">
                            <p class="text-xl  text-secondary font-weight-bold mb-0"><?=$data['nama_k']?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                      <p class="d-flex flex-column text-xs "><?=$data['email']?></p>
                      </td>
                      <td>
                        <p class="d-flex flex-column text-xs text-secondary mb-0"><?=$data['pesan']?></p>
                      </td>
                      <td>
                        <span class="d-flex flex-column text-secondary text-xs font-weight-bold"><?=$data['tanggal']?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <button onclick="hapus(<?=$data['id_k']?>)" name="hapus" class="btn btn-danger d-flex flex-column">Delete</button>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <script>
            function hapus(id) {
              let h = confirm('Pesan akan dihapus!!');
              if(h) {
                location.href = "?menu=contact&hapus="+id;
              }
            }
          </script>
          </div>
        </div>