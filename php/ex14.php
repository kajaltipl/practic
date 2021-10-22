
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <title>Document</title>
   
    <style>
             h1 {
            margin-left: 20px;
        }



        .a {
            width: 100%;
            padding: 10px;
            display: inline-flex;
            margin-right: 10px;
        }

        .b {
            width: 33.3%;
            padding: 10px;
            box-sizing: border-box;
        }

        .c {
            width: 100%;
            box-sizing: border-box;
        }

        .e {
            width: 100%;
            display: inline-flex;
        }

        .f {
            text-align: center;
            width: 10%;
            background-color: #ddd;
        }

        .d {
            width: 90%;
        }

        .g {
            width: 50%;
            padding: 10px;
            box-sizing: border-box;
        }

        .h {
            width: 25%;
            padding: 10px;
            box-sizing: border-box;
        }

        .j {
            width: 100%;
            padding: 10px;
            display: inline-flex;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div>
        <h1>First form</h1>
        <form name="myForm" >
            <div class=a>

                <div class="b"><label for="first_name">First name: </label><br>
                    <input type="text" class="c" name="FirstName" id="first_name" placeholder="enter your name">
                    <span id="sfirst"></span>
                </div>
                <div class="b">
                    <lable for="last_name">last name: </lable><br>
                    <input type="text" class="c" name="lastname" id="last_name" placeholder="enter your last name">
                    <samp id="slast"></samp>
                </div>
                <div class="b">
                    <lable for="user_name">user name: </lable><br>
                    <div class="e">

                        <div class=f>@</div><input type="text" class="d" name="username" id="user_name"
                            placeholder="enter your user name">

                    </div>
                    <span id=suser></span>
                </div>
            </div>
            <div class=j>
                <div class=g>
                    <label for="city_name">city name: </label><br>
                    <input type="text" class="c" name="cityname" id="city_name" placeholder="enter your city name">
                    <span id="scity"></span>
                </div>
                <div class="h">
                    <label for="state_name">state name: </label><br>
                    <input type="text" class="c" name="statename" id="state_name" placeholder="enter your city name">
                    <span id="sstate"></span>
                </div>
                <div class=h>
                    <label for="zip">zip: </label><br>
                    <input type="number" maxlength="5" minlength="5" class="c" name="zipn" id="zip_c" placeholder="zip">
                    <samp id=szip></samp>
                </div>
            </div>
            <div class="a">
                <!-- <input type="checkbox" name="checkbox" id="checkbox_i"><label for="checkbox">agree to all -->
                    <!-- term and condition</label><span id=che_i></span> -->
            </div>
            <div class="a">
                <button>Submit</button>
                
            </div>

    </div>
    </form>
    <div id="output"></div>
    
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
       $(document).ready(function() {
            $("button").click(function() {
                $('#output').empty();
                var x = $("form").serializeArray();
                $.each(x, function(i, field) {
                    $("#output").append(field.name + ":"
                            + field.value + " "); 
                });
                return false;                
            });
        }); 
    </script>
</body>
</html>
