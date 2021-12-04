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

	<title>Update employee</title>
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
				<div class="panel panel-default">
					<div class="panel-heading">Add Employees</div>
					<div class="panel-body">
						<?php
						$employee_details = $this->db->get_where('employees', array('e_id' => $id ));
						foreach ($employee_details->result() as $employee)
						{?>
						# code...


						<?php echo
						form_open('','class="form-horizontal"');
						?>
						<div class="form-group">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
								<input type="text" name="e_name" class="form-control input-sm" placeholder="Name"
									value="<?= $employee->e_name ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="text" name="e_email" class="form-control input-sm" placeholder="Email"
									value="<?= $employee->e_email ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Phone</label>
							<div class="col-sm-10">
								<input type="text" name="e_phone" class="form-control input-sm" placeholder="Phone"
									value="<?= $employee->e_phone ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Select Job</label>
							<div class="col-sm-10">
								<select name="e_job" class="form-control input-sm">
									<option value="-">select</option>
									<?php
									$job_list = $this->db->get('jobs');
											foreach ($job_list->result() as $job)
											{ ?>
									<option value="<?= $job->j_name ?>"><?= $job->j_name ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" name="add_employee" value="Add Employee" class="btn btn-sm btn-success">
							</div>
						</div>
						<?php
						form_close();
					?>
						<?php }

						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- dashboard data -->
	<!-- Optional JavaScript; choose one of the two! -->
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
