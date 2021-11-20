<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!$_SESSION['u_user']){
  redirect('home', 'refresh');
}
?>

<h1>Welcome</h1>