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
			<div class="col-lg-43 col-md-3">
				<!-- sidebar -->
				<?php $this->load->view('dash/inc/sidebar'); ?>
				<!-- sidebar -->
			</div>
			<div class="col-lg-9 col-md-9">
				<table class="table table-bordered">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>edit</th>
						<th>delete</th>
					</tr>

					<?php
					$job_list = $this->db->get('jobs');

					foreach($job_list->result() as $job)
					{ ?>
					<tr>
						<td><?= $job->j_id ?></td>
						<td><?= $job->j_name ?></td>
						<td><a href="<?php echo site_url() ?>/jobs/update_job/<?= $job->j_id ?>"
								class="btn btn-info btn-block btn-xs">edit</a></td>
						<td><a href="<?php echo site_url() ?>/jobs/delete_job/<?= $job->j_id ?>"
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
