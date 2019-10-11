<?php
  include 'core/conn.php';
  $user = $_SESSION['SES_MarketPlace'];
  $sql = "SELECT * FROM user where username = '$user' " ;
  $query = mysqli_query($conn,$sql);
  $r = mysqli_fetch_array($query);
  $hak_akses = $r['hak_akses'];
  $id_user = $r['id_user'];
 ?>
