<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if( !$_SESSION['u_name'] ){
  redirect('home', 'refresh');
}
?>
<!-- Welcome, <?php echo $_SESSION['u_name']; ?>!-->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" >

    <title>Dashboard</title>
  </head>
  <body>
<!--dash nav -->
<?php
$this->load->view('dash/inc/nav');
 ?>
<!--dash nav -->
<!-- dashboard data -->
<div class="container">
  <div class="row">
<div class="col-lg-43 col-md-3">
<!-- sidebar -->
<?php $this->load->view('dash/inc/sidebar'); ?>
<!-- sidebar -->
</div>
<div class="col-lg-9 col-md-9"></div>
  </div>
</div>
<!-- dashboard data -->

<!-- <a href=" <?php echo base_url(); ?>assets/css/bootstrap.min.css">ds</a> -->

    <!-- Optional JavaScript; choose one of the two! -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>