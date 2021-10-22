<?php
require('image-gallery-script.php');
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/style.css">
<body>
<!--======image gallery ========-->
<div class="container">
<div class="row">
    
<?php
  if(!empty($fetchImage))
  {
    $sn=1;
    foreach ($fetchImage as $img) {
        
?>
    <div class="col-md-3">
    <img src="images/
<?php
echo $img['image_name']; 
?>
" style="width:100%"   onclick="openModal(); currentSlide(
<?php
echo $sn; 
?>
)" class="hover-shadow cursor">
  </div>
<?php
 $sn++;}
  }else{
    echo "No Image is saved in database";
  }
?>
</div>
<!--======image gallery ========-->
<div id="galleryModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <!--======image gallery modal========-->
  <div class="modal-content">
      
<?php
  if(!empty($fetchImage))
  {
    $sn=1;
    foreach ($fetchImage as $img) {
        
?>
<div class="gallerySlides">
      <div class="numbertext"> /4</div>
      <img src="images/
<?php
echo $img['image_name']; 
?>
" style="width:100%">
    </div>
<?php
 $sn++;}
  }else{
    echo "No Image is saved in database";
  }
?>
   <!--======image gallery model========-->
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    <div class="caption-container">
      <p id="caption"></p>
    </div>
  </div>
</div>
</div>
<script type="text/javascript" src="gallery-script.js"></script>
    
</body>
</html>