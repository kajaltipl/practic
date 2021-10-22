<!DOCTYPE html>
<html>
    <head>
        <style>
           * {
            box-sizing: border-box;      
        }
        .specialsymbol{
	        width: 30px;
	        background-color: #ddd;
	        border-right:1px solid;
	        padding: 10px;
	        text-align: center;
        }
    .setspecial{
	        width: 100%;	
	        display: inline-flex;
            }
        .simple
            {
                width: 100%;
                height: 300px;
                z-index: -1;
                background-color: gray;
            }

        .row {
            display: inline-flex;
            width: 100%;
        }

        .col-50 {
            width: 50%;
            padding: 10px;
        }

        .col-30 {
            width: 30%;
            padding: 10px;
        }

        .col-20 {
            width: 20%;
            padding: 10px;
        }

        .col-100 {
            width: 100%;
            padding: 10px;
        }
        .btn{
            width: 70px;
            height: 40px;
            background-color: rgba(56, 137, 243, 0.966);
            color: white;
            font-size: 15px;
            border: none;
            border-radius: 5px;
            margin-left: 15px;

        }
        .input {
	        border-left:0px;
        }
        .mt-10{
            margin-top: 10px;
        }
        .border
        {
            border: 2px solid rgba(14, 13, 13, 0.863) ;
            background-color: white;
            padding: 15px;
            width: 100%;
            border-right: none;
        }
        .error {color: #FF0000;}
       
        </style>
    </head>
    <title> Instyle-Text </title>
    <body>
        <?php
        $cityErr = $stateErr = $zipErr =$username= $firstnameErr = "";
        $city = $state = $zip = $usernameErr = $firstname ="";
        

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        if (empty($_POST["city"])) {
            $cityErr = "Enter The City Name ";
          } else {
            $city = test_input($_POST["city"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
              $cityErr = "Only letters and white space allowed";
            }
          }
        
          if (empty($_POST["state"])) {
            $stateErr = "Enter the State Name ";
          } else {
            $state = test_input($_POST["state"]);
            // check if name only contains letters and whitespace
            
          }
        
          if (empty($_POST["zip"])) {
            $zipErr = " Enter the Zip ";
          } else {
            $zip = test_input($_POST["zip"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[0-9' ]*$/",$zip)) {
                $stateErr = "Only letters and white space allowed";
              }
          }
          if (empty($_POST["username"])) {
            $usernameErr = " Enter the Zip ";
          } else {
            $username = test_input($_POST["username"]);
            // check if name only contains letters and whitespace
            
          }
          if (empty($_POST["firstname"])) {
            $firstnameErr = " Enter the Firstname ";
          } else {
            $firstname = test_input($_POST["firstname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
                $firstnameErr = "Only letters and white space allowed";
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
                <div class="row border">
                    <div class="col-50">
                    <label>City</label>
                <input class="col-100 mt-10" name=city type="text" placeholder="" value="<?php echo $city;?>">
                <span class="error">* <?php echo $cityErr;?></span>
                    </div>
                    <div class="col-30">
                    <label>State</label>
                
                <select class="col-100 mt-10" name=state value="<?php echo $state;?>" >
                    <option> Choose....</option>
                    <option> 1. Gujarat</option>
                    <option> 2. Maharastra </option>
                    <option> 3. Rajasthan </option>
                    <option> 4. Utter-Pradesh </option>
                    <option> 5. Karnataka </option>
                </select>
                <span class="error">* <?php echo $stateErr;?></span>
                       
                    </div>
                    <div class="col-20">
                    <label>Zip </label>
                <input class="col-100 mt-10" type="text" placeholder="Zip" name=zip value="<?php echo $zip;?>" >
                <span class="error">* <?php echo $zipErr;?></span>
                    </div>
                </div>
            </div>
            <div class="row simple">
            </div> 
            
                <h2>Auto-sizing</h2>
            
                <p>The Example below uses a flexbox to vertically center the contents and changes <font color="red">.col </font> to <font color="red">.col-auto </font>  sothat your columns only take <br> up as much space as needed. Put other way, the column sizes it based on its content</p>
            
            <div class="row border">
                
                <div class="col-20">
                        <input type="text" placeholder="Otto" name=firstname class="col-100">
                        <span class="error">* <?php echo $firstnameErr;?></span>
                </div>
                <div class="col-20">	
                        <div class="setspecial">
                            <div class="specialsymbol">@</div>
                            <input type="text" placeholder="UserName" name="username" id="User_Name" class="col-100 input" value="<?php echo $username;?>">
                            <span class="error">* <?php echo $usernameErr;?></span>
                        </div>
                </div>
                <div class="col-30">
                    <input type="checkbox">Remember Me
                    <input class="btn" type="Submit" value="Submit" >
                </div>
            
            </div>
        </form> 
        <?php
        
        echo $city;
        echo "<br>";
        echo $state;
        echo "<br>";
        echo $zip;
        echo "<br>";
        echo $username;
        echo "<br>";
        echo $firstname;
        
?>
    </body>
</html>        