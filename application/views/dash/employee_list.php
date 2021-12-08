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
			<div class="col-lg-3 col-md-3">
				<!-- sidebar -->
				<?php $this->load->view('dash/inc/sidebar'); ?>
				<!-- sidebar -->
			</div>
			<div class="col-lg-9 col-md-9">
				<form class="form-inline" action="<?php echo site_url() . 'employees'; ?>" method="post">
					<select class="form-control" name="field">
						<option selected="selected" disabled="disabled" value="">Filter By</option>
						<option value="first_name">Name</option>
						<!-- <option value="last_name">Last Name</option>
			<option value="email">Email Name</option> -->
					</select>
					<input class="form-control" type="text" name="search" value="" placeholder="Search...">
					<input class="btn btn-default" type="submit" name="filter" value="Go">
				</form>

				<table class="table table-bordered">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Details</th>
						<th>Edit/Update</th>
						<th>Delete</th>
					</tr>

					<?php
					$employee_list = $this->db->get('employees');

					foreach($employee_list->result() as $employee)
					{ ?>
					<tr>
						<td><?= $employee->e_id ?></td>
						<td><?= $employee->e_name ?></td>
						<td><a href="<?php echo site_url() ?>/employees/single_employee/<?= $employee->e_id ?>"
								class="btn btn-info btn-block btn-xs">details</a></td>
						<td><a href="<?php echo site_url() ?>employees/update_employee/<?= $employee->e_id ?>"
								class="btn btn-warning btn-block btn-xs">edit/update</a></td>
						<td><a href="<?php echo site_url() ?>employees/delete_employee/<?= $employee->e_id ?>"
								class="btn btn-danger btn-block btn-xs">delete</a></td>
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
