<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Slider - Range slider</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  

<script>
function filterProducts() {
    var price_range = $('.price_range').val();
    $.ajax({
        type: 'POST',
        url: 'getProducts.php',
        data:'price_range='+price_range,
        beforeSend: function () {
            $('.container').css("opacity", ".5");
        },
        success: function (html) {
            $('#productContainer').html(html);
            $('.container').css("opacity", "");
        }
    });
}
</script>
</head>
<body>
<?php
if(isset($_POST['price_range'])){
    
    //Include database configuration file
    include('conn.php');
    
    //set conditions for filter by price range
    $whereSQL = $orderSQL = '';
    $priceRange = $_POST['price_range'];
    if(!empty($priceRange)){
        $priceRangeArr = explode(',', $priceRange);
        $whereSQL = "WHERE price BETWEEN '".$priceRangeArr[0]."' AND '".$priceRangeArr[1]."'";
        $orderSQL = " ORDER BY price ASC ";
    }else{
        $orderSQL = " ORDER BY created DESC ";
    }
    
    //get product rows
    $query = $conn->query("SELECT * FROM product $whereSQL $orderSQL");
    
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
    ?>
            <div class="list-item">
                <h2><?php echo $row["p_name"]; ?></h2>
                <h4>Price: <?php echo $row["product_price"]; ?></h4>
            </div>
    <?php }
    }else{
        echo 'Product(s) not found';
    }
}
?>
    </body>
    </html>
    