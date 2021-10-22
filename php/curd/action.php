<?php
	session_start();
	require 'conn.php';

	// Add products into the cart table
	if (isset($_POST['pid'])) {
	  $pid = $_POST['pid'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pimage = $_POST['pimage'];
	  $pcode = $_POST['pcode'];
	  $pqty = $_POST['pqty'];
	  $total_price = $pprice * $pqty;

	  $stmt = $conn->prepare('SELECT product_code FROM cart WHERE product_code=?');
	  $stmt->bind_param('s',$pcode);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['product_code'] ?? '';

	  if (!$code) {
	    $query = $conn->prepare('INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code) VALUES (?,?,?,?,?,?)');
	    $query->bind_param('ssssss',$pname,$pprice,$pimage,$pqty,$total_price,$pcode);
	    $query->execute();

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart!</strong>
						</div>';
	  } else {
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
	  }
	}

	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $conn->prepare('SELECT * FROM cart');
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $conn->prepare('DELETE FROM cart WHERE id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:cart.php');
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $conn->prepare('DELETE FROM cart');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:cart.php');
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  $pmode = $_POST['pmode'];

	  $data = '';

	  $stmt = $conn->prepare('INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)');
	  $stmt->bind_param('sssssss',$name,$email,$phone,$address,$pmode,$products,$grand_total);
	  $stmt->execute();
	  $stmt2 = $conn->prepare('DELETE FROM cart');
	  $stmt2->execute();
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
								<h4>Payment Mode : ' . $pmode . '</h4>
						  </div>';
	  echo $data;
	}
	if(isset($_REQUEST['default']) && $_REQUEST['default'] == "kajal") {
		
			$myProductBlock = "";
  			$stmt = $conn->prepare('SELECT * FROM product');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
			
  			  $myProductBlock .= '<div class="col-sm-6 col-md-4 col-lg-3 mb-2">
					<div class="card-deck">
					<div class="card p-2 border-secondary mb-2">
						<img src="images/'.$row['p_img'].'" class="card-img-top" height="250">
						<div class="card-body p-1">
						<h4 class="card-title text-center text-info">'.$row['p_name'].'</h4>
						<h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;'.number_format($row['product_price'],2).'/-</h5>

						</div>
						<div class="card-footer p-1">
						<form action="" class="form-submit">
							<div class="row p-2">
							<div class="col-md-6 py-1 pl-4">
								<b>Quantity : </b>
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control pqty" value="'.$row['product_qty'].'">
							</div>
							</div>
							<input type="hidden" class="pid" value="'.$row['p_id'].'">
							<input type="hidden" class="pname" value="'.$row['p_name'].'">
							<input type="hidden" class="pprice" value="'.$row['product_price'].'">
							<input type="hidden" class="pimage" value="'.$row['p_img'].'">
							<input type="hidden" class="pcode" value="'.$row['product_code'].'">
							<button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
							cart</button>
						</form>
						</div>
					</div>
					</div>
				</div>';
				endwhile;
				//$myProductBlock .='Chetan Sheth';
			
			echo $myProductBlock;
	}
	if (isset($_REQUEST['search_param'])) {
		$search_param = mysqli_real_escape_string($conn, $_REQUEST['search_param']);
		//$query = mysqli_query($conn, "SELECT * FROM product where p_name like '%$search_param%'  order by p_id limit 20");
		
			$myProductBlock = "";
  			$stmt = $conn->prepare("SELECT * FROM product where p_name like '%$search_param%'  order by p_id limit 20");
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc())
			{
  			  $myProductBlock .= '<div class="col-sm-6 col-md-4 col-lg-3 mb-2">
					<div class="card-deck">
					<div class="card p-2 border-secondary mb-2">
						<img src="images/'.$row['p_img'].'" class="card-img-top" height="250">
						<div class="card-body p-1">
						<h4 class="card-title text-center text-info">'.$row['p_name'].'</h4>
						<h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;'.number_format($row['product_price'],2).'/-</h5>

						</div>
						<div class="card-footer p-1">
						<form action="" class="form-submit">
							<div class="row p-2">
							<div class="col-md-6 py-1 pl-4">
								<b>Quantity : </b>
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control pqty" value="'.$row['product_qty'].'">
							</div>
							</div>
							<input type="hidden" class="pid" value="'.$row['p_id'].'">
							<input type="hidden" class="pname" value="'.$row['p_name'].'">
							<input type="hidden" class="pprice" value="'.$row['product_price'].'">
							<input type="hidden" class="pimage" value="'.$row['p_img'].'">
							<input type="hidden" class="pcode" value="'.$row['product_code'].'">
							<button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
							cart</button>
						</form>
						</div>
					</div>
					</div>
				</div>
				<?php endwhile; ?>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">
				<li class="nav-item">
						
					</li>
					<li class="nav-item">
					<a class="nav-link active" href="index.php"><i class="fas fa-mobile-alt mr-2"></i>Products</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#"><i class="fas fa-th-list mr-2"></i>Categories</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
					</li>
				</ul>';
			}
			echo $myProductBlock;
	}
		
	
?>