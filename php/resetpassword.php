<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['Submit']))
{
include("conn.php");
//print_r($_SESSION);
 $useremail=$_SESSION['email'];
 //print_r($_SESSION);
 //print_r($useremail);
$newpassword=$_POST['npwd'];
$num=1;
//print_r($num);
if($num>0)
{
 $con=mysqli_query($conn,"update customer_reg set password=' $newpassword' where email='$useremail' && email='$useremail'");
 echo "<script>window.open('ex17.php','_self')</script>"; 
 $_SESSION['msg1']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg1']="Old Password not match !!";
}
//print_r($_SESSION);
}

?>
<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            box-sizing: border-box;

        }

        .row {
            width: 100%;
            padding: 3px;

        }

        .col-100 {
            width: 90%;
            box-sizing: border-box;
            padding: 5px;

        }

        .lablecolor {
            color: dimgray;
            padding: 5px;
        }

        .btn {
            background-color: blue;
            height: 25px;
            border-radius: 5px;
            color: white;


        }

        .inline {
            display: inline-flex;
            margin: 10px;
        }

        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
<p style="color:red;"><?php echo $_SESSION['msg1']="";?></p>
    <form name="chngpwd" action="" method="post" onSubmit="return valid();">
        <table align="center">
            <tr height="50">
                <td>New Passowrd :</td>
                <td><input type="password" name="npwd" id="npwd"></td>
            </tr>
            <tr height="50">
                <td>Confirm Password :</td>
                <td><input type="password" name="cpwd" id="cpwd"></td>
            </tr>
            <tr>
                <td><input type="submit" name="Submit" value="Change Passowrd" /></td>
            </tr>
        </table>
    </form>
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.npwd.value == "") {
                alert("New Password Filed is Empty !!");
                document.chngpwd.npwd.focus();
                return false;
            } else if (document.chngpwd.cpwd.value == "") {
                alert("Confirm Password Filed is Empty !!");
                document.chngpwd.cpwd.focus();
                return false;
            } else if (document.chngpwd.npwd.value != document.chngpwd.cpwd.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.chngpwd.cpwd.focus();
                return false;
            }
            return true;
        }
    </script>
   
</body>

</html>