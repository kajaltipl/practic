<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Data</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax/ajax.js"></script>
</head>
<body>
    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Product</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New User</span></a>
						<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>p_id</th>
                        <th>p_name</th>
                        <th>p_desc</th>
                        <th>p_img</th>
                        <th>p_status</th>
						 
                    </tr>
                </thead>
				<tbody>
				
				<?php
                //https://www.studentstutorial.com/php/php-crud.php
                //https://phppot.com/php/php-crud-with-mysql/
				https://www.javatpoint.com/image-gallery-crud-using-php-mysql
				$result = mysqli_query($conn,"SELECT * FROM product");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["p_id"]; ?>">
				<td>
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["p_id"]; ?>">
								<label for="checkbox2"></label>
							</span>
						</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["p_name"]; ?></td>
					<td><?php echo $row["p_desc"]; ?></td>
					<td><?php echo $row["p_img"]; ?></td>
					<td><?php echo $row["p_status"]; ?></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-p_id="<?php echo $row["p_id"]; ?>"
							data-p_name="<?php echo $row["p_name"]; ?>"
							data-p_desc="<?php echo $row["p_desc"]; ?>"
							data-p_img="<?php echo $row["p_img"]; ?>"
                            data-p_status="<?php echo $row["p_status"]; ?>"
							 
							title="Edit"></i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["p_id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete"></i></a>
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form">
					<div class="modal-header">						
						<h4 class="modal-title">Add Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>P_NAME</label>
							<input type="text" id="p_name" name="p_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>p_desc</label>
							<input type="text" id="p_desc" name="p_desc" class="form-control" required>
						</div>
						<div class="form-group">
							<label>p_img</label>
							<input type="text" id="p_img" name="p_img" class="form-control" required>
						</div>
						<div class="form-group">
							<label>p_status</label>
							<input type="text" id="p_status" name="p_status" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					     
                        <input type="submit" class="btn btn-primary" id="btn-add" value="Submit">
						 
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="p_id" class="form-control" required>					
						<div class="form-group">
							<label>P_NAME</label>
							<input type="text" id="name_u" name="p_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>p_desc</label>
							<input type="text" id="email_u" name="p_desc" class="form-control" required>
						</div>
						<div class="form-group">
							<label>p_img</label>
							<input type="text" id="phone_u" name="p_img" class="form-control" required>
						</div>
						<div class="form-group">
							<label>p_status</label>
							<input type="text" id="city_u" name="p_status" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="p_id" class="form-control">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html> 