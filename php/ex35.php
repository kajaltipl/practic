<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>



<?php
include "conn.php"; // Using database connection file here

if(isset($_POST['submit']))
{		
    $fullname = $_POST['c_name'];
    $eml = $_POST['c_email'];
    $des = $_POST['c_desc'];
    $feedback =$_POST['feedback'];

    $insert = mysqli_query($conn,"INSERT INTO contact VALUES ('$fullname','$eml','$des','$feedback')");
    print_r($insert);
    if(!$insert)
    {
        echo mysqli_error($conn);
    }
    else
    {
        echo "Records added successfully.";
    }
}

mysqli_close($conn); // Close connection
?>
<h3><a href="logout.php"> logout </a></h3>
<h3>Contact Us</h3>

<div class="container">


<form method="POST">
<label> Name</label> : <input type="text" name="c_name" class ="row"placeholder="Enter Full Name" Required>
  <br/>
  <label>Email</label>  <input type="text" name="c_email" placeholder="Enter Email" Required>
  <br/>
  <label for="subject">Subject</label>
    <textarea id="subject" name="c_desc" placeholder="Write something.." style="height:200px"></textarea>
   <br>
   <select name="feedback" id = "feedback">    
         <option value="none">Give Feedback</option>    
          <option id = "feedback" value="website">Website</option>    
          <option id = "feedback" value="Content">Content</option>    
          <option id = "feedback" value="UI">UI</option>     
          <option id = "feedback" value="Speed">Speed</option>    
    </select>    
   <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>