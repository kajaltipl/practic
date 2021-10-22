<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
.row{
	display: inline-flex;
	width:100%;
	box-sizing: border-box;
	margin-bottom: 10px;
	margin-top: 10px;
}
.col-33{
	width: 33.33%;
	padding: 5px;
	box-sizing: border-box;

}
.col-100{
	width: 100%;
	padding: 10px;
	box-sizing: border-box ;
	border-radius: 4px;
}
.button{
	margin: 5px;
	padding: 10px;
	background-color:rgb(11, 105, 245) ;
	color: white ;
	border-radius: 10px;
}
.specialsymbol{
	width: 25px;
	background-color: #ddd;
	border-right:1px solid;
	padding: 10px;
	text-align: center;
}
.setspecial{
	width: 100%;	
	display: inline-flex;

}
.col-50{
	width: 50%;
	padding: 5px;
	box-sizing: border-box ;
}
.col-25{
	width: 25%;
	padding: 5px;
	box-sizing: border-box ;
}
.terms{
	margin-bottom: 20px;
}
.input {
	border-left:0px;
}
</style>    
</head>  
<title>Custom-style </title>
<body>
<?php
// define variables and set to empty values
$firstnameErr = $lastnameErr=  $usernameErr = $cityErr = $stateErr = $zipErr = "";
$firstname =  $lastname = $username = $city = $state = $zip = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "First Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["username"])) {
    $usernameErr = "User Name is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["city"])) {
    $cityErr = "City Name is required";
  } else {
    $city = test_input($_POST["city"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
      $cityErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["state"])) {
    $stateErr = "state Name is required";
  } else {
    $state = test_input($_POST["state"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$state)) {
      $stateErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["zip"])) {
    $zipErr = "Zip Name is required";
  } else {
    $zip = test_input($_POST["zip"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9' ]*$/",$zip)) {
        $stateErr = "Only letters and white space allowed";
      }
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	<div>
		<div class="row">
			<div class="col-33"> 
    			<label>First Name </label>
    			<input type="text" placeholder="Mark"  name="firstname" class="col-100" value="<?php echo $firstname;?>" >
                <span class="error">* <?php echo $firstnameErr;?></span>
            </div>
			<div class="col-33">
					<label>Last Name</label>
					<input type="text" placeholder="Otto" id="Last Name"  name="lastname" class="col-100" value="<?php echo $lastname;?>" >
                    <span class="error">* <?php echo $lastnameErr;?></span>
                </div>
			<div class="col-33">	
					<label>User Name</label>
					<div class="setspecial">
						<div class="specialsymbol">@</div>
						<input type="text" placeholder="UserName" id="User Name" name="username" class="col-100 input"  value="<?php echo $username;?>">
                        
                    </div>
                    <span class="error">* <?php echo $usernameErr;?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-50"> 
    			<label>City </label>
    			<input type="text" placeholder="City" id="City"  name="city" class="col-100"  value="<?php echo $city;?>">
                <span class="error">* <?php echo $cityErr;?></span>
            </div>
			<div class="col-25">
					<label>State</label>
					<input type="text" placeholder="State" id="State" name="state" class="col-100"  value="<?php echo $state;?>" >
                    <span class="error">* <?php echo $stateErr;?></span>
                </div>
			<div class="col-25">	
					<label>Zip</label>
					<input type="number" placeholder="Zip" name="zip" class="col-100"  value="<?php echo $zip;?>">
                    <span class="error">* <?php echo $zipErr;?></span>
                </div>
		</div>
		<div class="row">
			<label class="terms"> </label>
    		<input type="checkbox" id="checkbox">Agree to Terms and conditions
		</div>
		<div class="row">
			<label> </label>
    		<input type="submit"  class="button" id="submitform" value="Submit Form" >
		</div>
	</div>
    </form>    
	<script>
		
	</script>
<?php
echo "<h2>Your Input:</h2>";
echo $firstname;
echo "<br>";
echo $lastname;
echo "<br>";
echo $username;
echo "<br>";
echo $city;
echo "<br>";
echo $state;
echo "<br>";
echo $zip;
echo "<br>";

?>    
</body>    
</html>