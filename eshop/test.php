
<?php
session_start();
include_once 'includes/psl-config.php';  //include config file
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Best Eshop Ever Made</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/eshop.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	
	
	
	
	
	
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <h3 class="text-muted">Best Eshop Ever</h3>
		
        <ul class="nav nav-justified">
          <li class="active"><a href="eshop.html">Home</a></li>
          <li><a href="cart.html">Cart</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        
		  <li>
      
			  <form class="navbar-form   "   role="search">
				<div class="form-group">
				  <input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			  </form>
			  
		  </li>
		  
		</ul>
		
      </div>
	  
	  
	  
	  
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
			<div class="item active">
			  <img src="img/tablet1.jpg" alt="First slide">
			  <div class="container">
				<div class="carousel-caption">
				  <h1>To kalitero tablet.</h1>
				  <p>Stin kaliteri timi.</p>
				  <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
				</div>
			  </div>
			</div>
			<div class="item">
			  <img src="img/tablet2.jpg" alt="Second slide">
			  <div class="container">
				<div class="carousel-caption">
				  <h1>Alo ena tablet.</h1>
				  <p>Stin defteri kaliteri timi.</p>
				  <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
				</div>
			  </div>
			</div>
			<div class="item">
			  <img src="img/tablet3.jpg" alt="Third slide">
			  <div class="container">
				<div class="carousel-caption">
				  <h1>Ena trito tablet.</h1>
				  <p>Stin triti kaliteri timi.</p>
				  <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
				</div>
			  </div>
			</div>
		  </div>
		  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		  <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	  
	  
	  

      <!-- Jumbotron -->
	  
	  
		<!-- 
      <div class="jumbotron">
        <h1>Marketing stuff!</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
      </div>
		-->
		
		
      <!-- Example row of columns -->
	
	  
	  
	  
	  <div class="products">
		<?php
		//current URL of the Page. cart_update.php redirects back to this URL
			$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			$results = $mysqli->query("SELECT * FROM products ORDER BY id ASC");
			if ($results) { 
				echo '<div class="row">';
				while($obj = $results->fetch_object())
				{
					echo '<form method="post" action="cart_update.php">';
					echo '<div class="col-lg-4">'; 
						echo '<div class="thumbnail">'; 
							echo '<img src="http://lorempixel.com/400/200/technics/1/" alt="post image">'; 
							echo '<div class="caption">'; 
								echo '<h2 class="">'.$obj->product_name.'</h2>'; 
								echo '<p class="">'.$obj->product_desc.'</p>'; 
								echo '<div class="row-fluid">'; 
									echo '<p class="lead">'.$obj->price.'</p>'; 
									echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
									echo '<button class="btn btn-success btn-block add_to_cart">Add To Cart</button>';
								echo '</div>'; 
							echo '</div>'; 
						echo '</div>'; 
						echo '<input type="hidden" name="product_code" value="'.$obj->product_code.'" />';
						echo '<input type="hidden" name="type" value="add" />';
						echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
					echo '</div>'; 
					echo '</form>';
				}
				echo '</div>'; 
			}
		?>
	  </div>
	  
	  	  
	  
	  
	  
	  
      <!-- Site footer -->
      <div class="footer">
        <hr>
		  
<div class="shopping-cart">
<h2>Your Shopping Cart</h2>
<?php
if(isset($_SESSION["products"]))
{
    $total = 0;
	
	echo '<table class="table table-striped">';
	
	echo '<thead>';
	echo '<tr>';
	echo '<td>Remove</td>';
	echo '<td>Name</td>';
	echo '<td>Quantity</td>';
	echo '<td>Price</td>';
	echo '</tr>';
	echo '</thead>';
	
	echo '<tbody>';
	
    foreach ($_SESSION["products"] as $cart_itm)
    {	
	
	echo '<tr>';
	echo '<td><span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span></td>';
	
	echo '<td> <h3>'.$cart_itm["name"].'</h3> </td>';
	echo '<td> <div class="p-qty">Qty : '.$cart_itm["qty"].'</div> </td>';
	echo '<td> <div class="p-price">Price :'.$currency.$cart_itm["price"].'</div> </td>';
	echo '</tr>';
        $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
        $total = ($total + $subtotal);
	
	}
	echo '</tbody>';
	
	echo '</table>';
	
	
	
	/*
    echo '<ol>';
    foreach ($_SESSION["products"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
        echo '<h3>'.$cart_itm["name"].'</h3>';
        echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
        echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
        echo '<div class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
        echo '</li>';
        $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
        $total = ($total + $subtotal);
    }
    echo '</ol>';
    echo '<span class="check-out-txt"><strong>Total : '.$currency.$total.'</strong> <a href="view_cart.php">Check-out!</a></span>';
    echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';
	*/
	
	}else{
    echo 'Your Cart is empty';
}
?>
</div>
	  

		
		
		<p>&copy; Company 2014</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
  </body>
</html>
