<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>


	<div class="col-md-6 well">


		<div class="col-md-8">
			<center>
				<form method="POST" class="form-inline" action="add_query.php">
					<input type="text" class="form-control" name="task" autocomplete="off" required />
					<button class="btn btn-primary form-control" name="add">Add Task</button>
				</form>
			</center>
		</div>
		<br /><br /><br />
		<form class="form-inline" method="POST">

			<input class="btn btn-primary form-control" type="submit" name="filter_pl" value="Pending List">
			<div class="col-md-1"></div>
			<input class="btn btn-primary form-control" type="submit" name="filter_cl" value="Completed List">
			<div class="col-md-1"></div>

			<input class="btn btn-primary form-control" type="submit" name="filter_all" value="Show All">
		</form>
		<br><br>
		<?php
		if (isset($_POST['filter_pl'])) {

		?>

			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Task</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require 'conn.php';
					$query = $conn->query("SELECT * FROM `task` WHERE status='Pending' ORDER BY `task_id` ASC");
					$count = 1;
					while ($fetch = $query->fetch_array()) {
					?>
						<tr>
							<td><?php echo $count++ ?></td>
							<td><?php echo $fetch['task'] ?></td>
							<td><?php echo $fetch['status'] ?></td>
							<td colspan="2">
								<center>
									<?php
									if ($fetch['status'] != "Completed") {
										echo
										'<a href="update_task.php?task_id=' . $fetch['task_id'] . '" class="btn btn-success">Done</a> |';
									}
									?>
									<a href="delete_query.php?task_id=<?php echo $fetch['task_id'] ?>" class="btn btn-danger">Delete</a>
								</center>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>

		<?php
		} else if (isset($_POST['filter_cl'])) {
		?>

			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Task</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require 'conn.php';
					$query = $conn->query("SELECT * FROM `task` WHERE status='Completed' ORDER BY `task_id` ASC");
					$count = 1;
					while ($fetch = $query->fetch_array()) {
					?>
						<tr>
							<td><?php echo $count++ ?></td>
							<td><?php echo $fetch['task'] ?></td>
							<td><?php echo $fetch['status'] ?></td>
							<td colspan="2">
								<center>
									<?php
									if ($fetch['status'] != "Completed") {
										echo
										'<a href="update_task.php?task_id=' . $fetch['task_id'] . '" class="btn btn-success">Done</a> |';
									}
									?>
									<a href="delete_query.php?task_id=<?php echo $fetch['task_id'] ?>" class="btn btn-danger">Delete</a>
								</center>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		<?php
		} else if (isset($_POST['filter_all'])) {
		?>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Task</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require 'conn.php';
					$query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
					$count = 1;
					while ($fetch = $query->fetch_array()) {
					?>
						<tr>
							<td><?php echo $count++ ?></td>
							<td><?php echo $fetch['task'] ?></td>
							<td><?php echo $fetch['status'] ?></td>
							<td colspan="2">
								<center>
									<?php
									if ($fetch['status'] != "Completed") {
										echo
										'<a href="update_task.php?task_id=' . $fetch['task_id'] . '" class="btn btn-success">Done</a> |';
									}
									?>
									<a href="delete_query.php?task_id=<?php echo $fetch['task_id'] ?>" class="btn btn-danger">Delete</a>
								</center>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>

		<?php } else { ?>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Task</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require 'conn.php';
					$query = $conn->query("SELECT * FROM `task` ORDER BY `status` ASC");
					$count = 1;
					while ($fetch = $query->fetch_array()) {
					?>
						<tr>
							<td><?php echo $count++ ?></td>
							<td><?php echo $fetch['task'] ?></td>
							<td><?php echo $fetch['status'] ?></td>
							<td colspan="2">
								<center>
									<?php
									if ($fetch['status'] != "Completed") {
										echo
										'<a href="update_task.php?task_id=' . $fetch['task_id'] . '" class="btn btn-success">Done</a> |';
									}
									?>
									<a href="delete_query.php?task_id=<?php echo $fetch['task_id'] ?>" class="btn btn-danger">Delete</a>
								</center>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>

		<?php } ?>
	</div>
</body>

</html>