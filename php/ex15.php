<!--
Used basic html and bootstrap skeleton from the below link for style purpose which contains bootstrap.css,bootstrap.js,jquery.js
https://www.w3schools.com/bootstrap/bootstrap_get_started.asp
Used bootstrap form elements from below link.
https://www.w3schools.com/bootstrap/bootstrap_forms.asp
http://tutorialsmint.com/tutorial/ajax-live-data-search-using-php-and-mysql-1566841187-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Live Demo: Ajax live data search using PHP and MySQL</title>
        <meta content='Live Demo: Ajax live data search using PHP and MySQL' name='description' />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">      
        <style>
            .img-box{
                max-height: 300px;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container" style="max-width:800px;margin:0 auto;margin-top:50px;">  
            <div>
                 
                <div>
                    <div style="margin-bottom:30px;"><input type="text" class="form-control" id="search_param" placeholder="Search"/></div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Make</th>
                                 
                            </tr>
                        </thead>
                        <tbody id="tbl_body">
                            <?php
                            $sql = mysqli_query($conn, "SELECT * FROM car ORDER BY id LIMIT 20");
                            while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['make']; ?></td>
                                     
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).on("keyup", "#search_param", function () {
                var search_param = $("#search_param").val();
                $.ajax({
                    url: 'ser.php',
                    type: 'POST',
                    data: {search_param: search_param},
                    success: function (data) {
                        $("#tbl_body").html(data);
                    }
                });
            });
        </script>      
    </body>
</html>