 

 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div>
  <h2>Call hello file</h2>
	<table border ="1" >
    <tbody id="table">
      
    </tbody>
  </table>
</div>
<script>
	$.ajax({
		url: "ex1.php", // call file ex1.php
		type: "POST", //post method
		cache: false,
		success: function(data){
			//alert(data);
			$('#table').html(data); 
		}
	});
</script>
</body>
</html>

 

</body>
</html>