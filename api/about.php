<?php
$koneksi = mysqli_connect("localhost", "root", "", "portofolio_sr");

$q = mysqli_query($koneksi, "select * from about where id=1");
$data = mysqli_fetch_assoc($q);

print json_encode($data);

