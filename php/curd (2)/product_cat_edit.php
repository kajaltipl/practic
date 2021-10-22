<?php
// include database connection file
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("conn.php");
$query = "select * from pro_cat where parent_cat_id = 0";
    $result = mysqli_query($conn,$query);
    $data = array();
    while($row = mysqli_fetch_array($result)) {
        $data[$row['c_id']] = $row['c_name'];

    }

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
	$c_id = $_POST['c_id'];
    $c_name=$_POST['c_name'];
	$parent_cat_id = $_POST['p_cat_id'];
	$c_status = $_POST['c_status'];
	$chkRecords = "Select * from pro_cat where c_name='".$c_name."' AND parent_cat_id='".$parent_cat_id."' AND c_id !=".$c_id;
	$resultchkRecords = mysqli_query($conn,$chkRecords);
	if(mysqli_num_rows($resultchkRecords) == 0 ){
		// update user data
		$result = mysqli_query($conn, "UPDATE pro_cat SET c_name='$c_name',parent_cat_id='$parent_cat_id',c_status='$c_status' WHERE c_id = $c_id");

		// Redirect to homepage to display updated user in list
		header("Location: product_cat.php");
	} else {
		$msg = "Duplicate Records Not Allowed.";
		header("Location: product_cat_edit.php?c_id=".$c_id."&msg=".$msg);
		exit();
	}
	
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$c_id = $_GET['c_id'];
$c_status  = $c_name = $parent_cat_id = "";
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM pro_cat WHERE c_id = $c_id");

while($user_data = mysqli_fetch_array($result))
{
	$c_name = $user_data['c_name'];
	$parent_cat_id = $user_data['parent_cat_id'];
	$c_status = $user_data['c_status'];
//	print_r($user_data);
}
?>
<html>
<head>
	<title>Category Edit Data</title>
</head>

<body>
	<a href="product_cat.php">Product Category</a>
	<br/><br/>

	<form name="update_user" method="post" action="product_cat_edit.php">
		<table border="0">
		<tr><td colspan = 3><?php echo isset($_GET['msg']) && $_GET['msg'] != "" ? $_GET['msg'] : "";?></td></tr>
		<tr>
				<td>Parent Category</td>
				<td><select name="p_cat_id" id="p_cat_id">
                    <option value="">Leave Blank to Make it Parent Category</option>
                   <?php foreach($data as $key=>$val){
					    $selectedoption = $key == $parent_cat_id ? "selected" : "";
                        echo "<option value=".$key." $selectedoption >".$val."</option>";
                    }
                    ?>
                </select></td>
            </tr>

			<tr>
				<td>Category Name</td>
				<td><input type="text" name="c_name" value=<?php echo $c_name;?>></td>
			</tr>
			
			 
            <tr>
				<td>Category Status</td>

                <td>
				<?
				
				?>	
				<select name="c_status">
				  <option value="1" <?php echo $c_status == "1" ? "selected":"";?>>Active</option>
                  <option value="2" <?php echo $c_status == "2" ? "selected":"";?>>DeActive</option>
               </select>

			
              </td>
								
							</tr>
							<tr>
								<td><input type="hidden" name="c_id" value=<?php echo $_GET['c_id'];?>></td>
								<td><input type="submit" name="update" value="Update"></td>
							</tr>
						</table>
					</form>
				</body>
				</html>