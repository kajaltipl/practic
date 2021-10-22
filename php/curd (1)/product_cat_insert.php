<?php
    // include database connection file
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include 'conn.php';
    $query = "select * from pro_cat where parent_cat_id = 0";
    $result = mysqli_query($conn,$query);
    $data = array();
    while($row = mysqli_fetch_array($result)) {
        $data[$row['c_id']] = $row['c_name'];

    }
?>
<!DOCTYPE HTML>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excersice-4</title>
    
<style>
.error {color: #FF0000;}
</style>
</head>
<?php
?>
 


<body>
	<a href="product_cat.php">go to category</a>
	<br/><br/>
  
	 
     <form method="post" name="form1" action="">      
		<table width="25%" border="0">
        <tr><td colspan = 3><?php echo isset($_GET['msg']) && $_GET['msg'] != "" ? $_GET['msg'] : "";?></td></tr>
        <tr>
				<td>Parent Category</td>
				<td><select name="p_cat_id" id="p_cat_id">
                    <option value="">Leave Blank to Make it Parent Category</option>
                   <?php foreach($data as $key=>$val){
                        $selectedrecords = isset($_GET['parent_cat_id']) && $_GET['parent_cat_id'] == $key ? "selected" : '';
                        echo "<option value=".$key." $selectedrecords >".$val."</option>";
                    }
                    ?>
                </select></td>
            </tr>
			<tr>
				<td>Category Name</td>
				<td><input type="text" name="c_name" value="<?php echo isset($_GET['cat_name']) ? $_GET['cat_name'] : '';?>"></td>
            </tr>
			
		   <tr>
				<td>Category Status</td>
                <td><select  id="dropdwn1" name="c_status">
                            
                              <option value="1">Active</option>
                              <option value="2">DeActive</option>
                    </select>
                     
                    
                </td>
			 
			</tr>
			<tr>
				<td></td>
                <td> <input type="submit" name="submit" value="Submit">  </td>
			</tr>
      </table>
	</form>
	<?php
        if(isset($_POST['submit'])) {
        $c_name =  $_POST['c_name'];
        $parent_cat_id = $_POST['p_cat_id'];
        $c_status = $_POST['c_status'];
        
        $chkforrecords = "Select * from pro_cat where c_name='".$c_name."' AND parent_cat_id='".$parent_cat_id."'";    
        
        $resultchkforrecords = mysqli_query($conn,$chkforrecords);
        if(mysqli_num_rows($resultchkforrecords) == 0 ) {
            $sql = "INSERT INTO pro_cat (c_name,parent_cat_id,c_status) VALUES ('$c_name', '$parent_cat_id', '$c_status')";
            if(mysqli_query($conn, $sql)){
            ob_clean();
            header("location:product_cat.php?msg=Data has been inserted successfully.");
            exit();
         }else
         {
            echo "ERROR:".$sql.mysqli_error($conn);
         }
          
            
            
        } else {
            $msg = "Record Already Exists.";
            ob_clean();
            header("location:product_cat_insert.php?cat_name=".$c_name."&msg=".$msg."&parent_cat_id=".$parent_cat_id);
            exit();
        }
    }  
    mysqli_close($conn);
    
    ?> 

</body>
</html>