<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if( !$_SESSION['u_name'] ){
  redirect('home', 'refresh');
}
?>
Welcome, <?php echo $_SESSION['u_name']; ?>