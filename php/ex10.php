<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
 <div border ="2"> 
<?php
if ($_POST) // If form was submited...
{
    $car = $_POST["car"];
    $word = $_POST["word"];
    $sword = $_POST["sword"];
    $pre = $_POST["pre"];
    $rep = $_POST["rep"];
    $rep_str = $_POST["rep_str"];
     
     // Get it into a variable
    echo "<h1>$car</h1>"; // Print it!
}

?>
<form method="post">
   <b>Enter the paragraph 250 words </b>
    <textarea name="car"></textarea>
    <br/>
    <b>check if a string contains a specific word </b>
    <input type="text" name="word" placeholder="enter the specific word">
    </br>
    <b>count specific word in string </b>
    <input type="text" name="sword" placeholder="enter the Count word">
    </br>
    <b>Enter replaced word </b>
    <input type="text" name="pre" placeholder="enter the pre">
    <input type="text" name="rep" placeholder="enter the rep word">
    </br>
    <b>Enter replaced string of  the remaining last replaced word</b>
    <input type="text" name="rep_str" placeholder="enter the repstr">
    
    <input type="submit" value="Go!" />
    </br>
    </br>
</form>
<?php 

    //$car= "In India, we give great importance to family. Also, the family educates the relationships and the qualities of children and kids. Indian morals and values are established in the joint family framework. Thus, the entire idea of nuclear family units doesn’t engage much in society. People always trust in taking everybody along and comprehend the importance of the word.";
 // $word = "one";
 //check if a string contains a specific word php”
  echo "</br>";
  echo "</br>";

 if (strpos($car, $word) !== false) {
  echo "<b>check if a string contains a specific word</b> = My string contains a specific word";
 }else{
  echo "<b>check if a string contains a word</b> = My string not contains a specific word";
 }

  echo "</br>";
  echo "</br>";

  //count specific word in string
   echo "<b>count  word  =</b> ". substr_count($car,$sword);
  //count specific word in string
 
   echo "</br>";
   echo "</br>";

  //count  total word in string
   echo "<b>Count  total word in string =</b> ".str_word_count($car);
   echo "</br>";
   echo "</br>";

     // Display replaced word
    //echo "Display replaced string = ". str_replace("family", "Air", $car);
    
    $var = str_replace($pre, $rep, $car);
    echo "<b>Display replaced string =</b> ". $var;
    echo "</br>";
    echo "</br>";

     // Display replaced string of  the remaining last replaced word.
     
     $pos = strrpos($var,$rep); // position 
     echo "<b>position = </b>". $pos;
     echo "</br>";
     //$replacement =" @@@@@  A paragraph is a number of sentences grouped together and relating to one topic. Or, a group of related sentences that develop a single point.";
     
     echo "</br>";
     echo "</br>";
 
     
     echo "<b>Display replaced string of  the remaining last replaced word</b> = ".substr_replace($var,$rep_str,$pos);
     
     echo "</br>";
     echo "</br>";
      
     // last replaced word 

     echo "<b>last replaced word string</b> = ". strrchr($var,$rep);  
     //echo strrchr("Hello world! sfssd","world");   

       
     //echo strrchr("Hello world! sfssd","world");   

?>
</body>
</html>

 
     