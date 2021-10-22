<?php 
class car
{
    private $link; //private by design
    function __construct()
    {
        $this->link = mysqli_connect("localhost","root","rOot@123!","Exercise") or 
        die(mysqli_error());
    }

    function insert_table($name,$make)
    {
         $res=mysqli_query($this->link,"INSERT INTO car(name,make) values ('$name','$make')");
         //print_r($res);
    return $res;
    }
}

?>

<html>
    <head>
        <title>OOP CRUD</title>
    </head>
    <body>
        <form action="" method="POST" name="form1">
            <table>
                <tr>
                    <td>name:</td>
                    <td><input type="text" name="name" /></td>
                </tr>
                <tr>
                    <td>make:</td>
                    <td><input type="number" name="make" /></td>
                </tr>
                <tr>
                <td colspan="2" align="center"> <input type="submit" name="submit" value="Insert" /> </td>
                </tr>
            </table>    
        </form>
        <?php 
        $con = new car();
         
        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $make=$_POST['make'];
            $con->insert_table($name, $make);
        }
        ?>
    </body>
</html>
