<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Print with Mpdf</title>
	<link rel="stylesheet" media="print" href="<?= bs('public/assets/css/bootstrap.min.css') ?>"> ?>
  	<link rel="stylesheet" media="print" href="<?= bs('public/assets/css/print.css') ?>">
  	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container" style="">
		<div class="row">
			<div class="col-md-10">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2><i class="fa fa-user" aria-hidden="true"></i>Users</h2>
						<div class="panel-ctrls"></div>
					</div>
					<div class="panel-body no-padding">
						<div id="demo">
							<table class="table">
								<thead>
									<tr>
										<th>User Name</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($all_users as $user):?>
										<tr>
											<td><?php echo htmlspecialchars($user->username,ENT_QUOTES,'UTF-8');?></td>
								            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
								            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
								            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?>
								            </td>
										</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>