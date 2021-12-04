<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if( !$_SESSION['u_name'] ){
  redirect('home', 'refresh');
}
$id=$this->uri->segment(3);
?>
<!-- Welcome, <?php echo $_SESSION['u_name']; ?>!-->

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

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
			<div class="col-lg-9 col-md-9">
				<table class="table table-bordered">
					<?php
          $employee_details = $this->db->get_where('employees', array('e_id' => $id ));
          foreach($employee_details->result() as $employee)
          {?>
					<tr>
						<th>Date</th>
						<td><?php echo $employee->e_date; ?></td>
					</tr>
					<tr>
						<th>Name</th>
						<td><?php echo $employee->e_name; ?></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><?php echo $employee->e_email; ?></td>
					</tr>
					<tr>
						<th>Phone</th>
						<td><?php echo $employee->e_phone; ?></td>
					</tr>
					</tr>
					<tr>
						<th>Job</th>
						<td><?php echo $employee->e_job; ?></td>
					</tr>
					<tr>
						<td colspan="2">
							<a href="" class="btn btn-info  btn-sm">edit</a>
							<a href="" class="btn btn-danger btn-sm">delete</a></td>
					</tr>
					<?php }

          ?>
				</table>
			</div>
		</div>
	</div>
	<!-- dashboard data -->

	<!-- <a href=" <?php echo base_url(); ?>assets/css/bootstrap.min.css">ds</a> -->

	<!-- Optional JavaScript; choose one of the two! -->
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
