<!DOCTYPE html>
<html>
<head>
    <style>
        * {
            box-sizing: border-box;      
        }
        .error {color: #FF0000;}
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
            background-color: rgb(80, 80, 240);
            color: white;
            font-size: 15px;
            border: none;
            border-radius: 5px;

        }
        .mt-10{
            margin-top: 10px;
        }
    </style>
</head>
<title>form -layout </title>

<body>
<?php
// define variables and set to empty values
$emailErr =  $password = $address= $address2 = $cityErr = $stateErr = $zipErr = "";
$email =  $passwordErr = $addressErr = $address2Err = $city = $state = $zip = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  } 

  
  if (empty($_POST["address"])) {
    $addressErr = "Address  is required";
  } else {
    $address = test_input($_POST["address"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$address)) {
        $addressErr = "Only letters and white space allowed";
      }
  }
  if (empty($_POST["address2"])) {
    $address2Err = "Address  is required";
  } else {
    $address2 = test_input($_POST["address2"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$address2)) {
        $address2Err = "Only letters and white space allowed";
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
        <div class="row">
            <div class="col-50">
                <label>Email</label>
                <input class="col-100 mt-10" type="email" placeholder="Email" name=email value="<?php echo $email;?>">
                <span class="error">* <?php echo $emailErr;?></span>
            </div>
            <div class="col-50">
                <label>Password</label>
                <input class="col-100 mt-10" type="password" name=password placeholder="password" value="<?php echo $password;?>">
                <span class="error">* <?php echo $passwordErr;?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <label>Address</label>
                <input type="text" class="col-100 mt-10" name=address placeholder="1234 Main st" value="<?php echo $password;?>">
                <span class="error">* <?php echo $addressErr;?></span>
            </div>
        </div>    
            <div class="row">
                <div class="col-100">
                    <label>Address 2</label>
                    <input type="text" class="col-100 mt-10" name=address2 placeholder="Apartment , studio, or floor" value="<?php echo $address2;?>">
                    <span class="error">* <?php echo $address2Err;?></span>
                </div>             
            </div>
        </div>
        <div class="col-30">
                <label>State</label>
                <span class="error">* <?php echo $stateErr;?></span>
                <select class="col-100 mt-10" name=state value="<?php echo $state;?>" >
                    <option> Choose....</option>
                    <option>Gujarat</option>
                    <option>Maharastra </option>
                    <option>Rajasthan </option>
                    <option>Utter-Pradesh </option>
                    <option>Karnataka </option>
                </select>
            </div>
        <div class="row">
            <div class="col-50">
                <label>City</label>
                <input class="col-100 mt-10" id="search-keyword1" name=city type="text" placeholder="" >
                <span class="error">* <?php echo $cityErr;?></span>
            </div>
           
            
            <div class="col-20">
                <label>Zip </label>
                <input class="col-100 mt-10" type="text" placeholder="Zip" name=zip value="<?php echo $zip;?>" >
                <span class="error">* <?php echo $zipErr;?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-100 mt-10">
                <input type="checkbox">Check Me Out
            </div>    
        </div>
        <div  class="row">
            <div class="col-100 mt-10">
                <input class="submit" type="submit" value="Submit" >
            </div>    
        </div>
        <script>
        
        var stateResult = [];
        $(document).on('keyup', '#search-keyword1', function() {
            var keyvalue = $("#search-keyword1").val();

            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    stateResult = [];
                    myFunction1(this, keyvalue);
                }
            };
            xhttp.open("GET", "city.xml", true);
            xhttp.send();
        });

      
        //     $("#search-keyword1").autocomplete({
        //         source: stateResult
        //     });
        // }

        // $(function() {
        //     $("#search-keyword1").autocomplete({
        //         source: stateResult
        //     });
        // });
        function fillcity(xml, key)
        {
            var x, i, xmlDoc, key;
            xmlDoc = xml.responseXML;
            x = xmlDoc.getElementsByTagName("city");
            var sel = document.getElementById("state");
            for()
            {
            sel.add(city,sel.option[]);
            }
        }
    </script>
    </form>
    <?php
echo "<h2>Your Input:</h2>";
echo "<br>";
echo $email;
echo "<br>";
echo $address;
echo "<br>";
echo $address2;
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