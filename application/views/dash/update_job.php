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

	<title>Add Job</title>
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
					<div class="panel-heading">Add Jobs</div>
					<div class="panel-body">
						<?php echo
						form_open('jobs/add_job','class="form-horizontal"');
						?>


						<?php
							$id = $this->uri->segment(3);
							// echo $id;
							$job_list = $this->db->get_where('jobs', array('j_id' => $id));
							foreach ($job_list->result() as $job)
							{ ?>
						<div class="form-group">
							<label class="col-sm-2 control-label">Job Name</label>
							<div class="col-sm-10">
								<input type="text" name="j_name" value="<?= $job->j_name ?>" class="form-control input-sm"
									placeholder="Job Name">
							</div>
						</div>

						<?php }
						?>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" name="update_job" value="Update Job" class="btn btn-sm btn-success">
							</div>
						</div>
						<?php
						form_close();
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
