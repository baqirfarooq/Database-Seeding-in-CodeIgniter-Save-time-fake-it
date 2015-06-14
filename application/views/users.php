<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Database Seeding in CodeIgniter By Baqir Memon</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="jumbotron">
			<div class="container">
				<h1>Baqir Memon (BM Concepts)</h1>
				<p>Database Seeding in CodeIgniter</p>
				<p>Save time – <a class="btn btn-danger btn-md" href="<?php echo site_url('user/seed'); ?>">Fake It</a></p>

				<p>
					
					<a class="btn btn-primary btn-lg" href="https://github.com/baqirmemon">Learn more</a>
				</p>
			</div>
		</div>


		<div class="container">
		<?php if ($this->session->flashdata('message')):?>
			<div class="alert alert-success">
				<strong><?php echo $this->session->flashdata('message'); ?></strong>
			</div>
		<?php endif; ?>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Username</th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Gender</th>
							<th>City</th>
							<th>State</th>
							<th>Country</th>
							<th>Postcode</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Birthdate</th>
							<th>ip_address</th>
						</tr>
					</thead>
					<tbody>
					<?php $i=0; ?>
						<?php foreach ($users as $user): ?>
							<tr>
								<td><?php echo ++$i; ?></td>
								<td><?php echo $user->username ?></td>
								<td><?php echo $user->firstname ?></td>
								<td><?php echo $user->lastName ?></td>
								<td><?php echo $user->gender ?></td>
								<td><?php echo $user->city ?></td>
								<td><?php echo $user->state ?></td>
								<td><?php echo $user->country ?></td>
								<td><?php echo $user->postcode ?></td>
								<td><?php echo $user->email ?></td>
								<td><?php echo $user->phone ?></td>
								<td><?php echo $user->phone ?></td>
								<td><?php echo $user->ip_address ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>