<?php


include '../config.php';
include './admin_dashboard.php';

?>



<!DOCTYPE html>

<html lang = "eng">
	<head>
		<title></title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
	
	
		<style>

		#add_activity, #cancel_activity{
			background-color: black;
			border: none;
		
		}
		
		a:hover{
			text-decoration: none;
		}

		#act_form{
			float: left;
			width: 60%;			
		}

		.btn btn-warning{
			background-color: black;
		}
		.panel-default {
    		border: none;
		}

		/* div{
			float: left;
			background-color: white;
			margin-left: 5%;
		} */
		hr{
			background-color: black;
			border: 2px solid black;
			width: 100%;
		}

		div{
			background-color: white;
		}	
		
		</style>
	</head>
<body>

	<br><br>



		
	
		<table id = "table" class = "table table-bordered"  style="background-color: white; float:left; margin-right:50px;">
			<thead>
				<tr>
					<th>Username</th>
					
					<th id="x">Password</th>
					<!-- <th>Confirmed Password</th> -->

					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$act_query = $conn->query("SELECT * FROM `users`");
				while($act_fetch = $act_query->fetch_array()){
				?>
				<tr>
					<td><?php echo $act_fetch['username']?></td>
					
					<td><?php echo $act_fetch['password']?></td>
					
					
					<!-- <td><a href="">Click Here</a></td> -->
					<td><center><a href = "edit_user.php?id=<?php echo $act_fetch['id']?>" class = "btn btn-warning" style='background-color:black; border:none'> Update</a> <a href = "#" data-toggle = "modal" data-target = "#delete_activity" name = "<?php echo $act_fetch['id']?>" class = "btn btn-danger activity_id" style='background-color:gray; border:none'>Delete</a></center></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>


	

	<div class = "modal fade" id = "delete_activity" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel" style="background-color: white;">
		<center><label class = "text-danger"'>Are you sure you want to delete this record?</label></center>
		<br />
		<center><a class = "btn btn-danger delete_activity" style='background-color:black;color:antiquewhite'> Yes!</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No" style='background-color:green;'> No</button></center>
	</div>

	
	
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.min.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	})
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.activity_id').on('click', function(){
			$activity_id = $(this).attr('name');
			$('.delete_activity').on('click', function(){
				window.location = 'delete_user.php?id=' + $activity_id;
			});
		})
	});
</script>
<script src = "../js/script.js"></script>
</html>