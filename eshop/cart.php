
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
    <link href="css/cart.css" rel="stylesheet">

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
          <li><a href="eshop.php">Home</a></li>
          <li class="active"><a href="cart.php">Cart</a></li>
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

      <!-- Jumbotron -->
      <div class="jumbotron">

		<div class="stepwizard">
			<div class="stepwizard-row">
				<div class="stepwizard-step">
					<button type="button" class="btn btn-primary btn-circle">1</button>
					<p>Cart</p>
				</div>
				<div class="stepwizard-step">
					<button type="button" class="btn btn-default btn-circle">2</button>
					<p>Shipping</p>
				</div>
				<div class="stepwizard-step">
					<button type="button" class="btn btn-default btn-circle" disabled="disabled">3</button>
					<p>Confirm</p>
				</div> 
			</div>
		</div>
	  
      </div>

		<div class="row">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Product</th>
							<th>Quantity</th>
							<th class="text-center">Price</th>
							<th class="text-center">Total</th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
			
			
			<?php
			if(isset($_SESSION["products"]))
			{
					$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
					
					$total = 0;
					foreach ($_SESSION["products"] as $cart_itm)
					{	
						echo '<tr>';
						echo '<td class="col-sm-8 col-md-6">';
						echo '<div class="media">';
						echo '<a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>';
						echo '<div class="media-body">';
						echo '<h4 class="media-heading"><a href="#">'.$cart_itm["name"].'</a></h4>';
						echo '<span>Status: </span><span class="text-success"><strong>In Stock</strong></span>';
						echo '</div>';
						echo '</div></td>';
						echo '<td class="col-sm-1 col-md-1" style="text-align: center">';
						echo '<input type="email" class="form-control" id="exampleInputEmail1" value="'.$cart_itm["qty"].'">';
						echo '</td>';
						echo '<td class="col-sm-1 col-md-1 text-center"><strong>'.$currency.$cart_itm["price"].'</strong></td>';
						echo '<td class="col-sm-1 col-md-1 text-center"><strong>'.$currency.$cart_itm["price"]*$cart_itm["qty"].'</strong></td>';
						echo '<td class="col-sm-1 col-md-1">';
						echo '<a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'"><button type="button" class="btn btn-danger">';
						echo '<span class="glyphicon glyphicon-remove"></span> Remove';
						echo '</button></a></td>';
						echo '</tr>';
						
						$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
						$total = ($total + $subtotal);
					
					}
				
			}
			else{
				echo 'Your Cart is empty';
				$subtotal=0;
				$total=0;
			}
			?>

					
					
					
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td><h5>Subtotal</h5></td>
							<td class="text-right"><h5><strong><?php echo $currency.$total; ?></strong></h5></td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td><h5>Estimated shipping</h5></td>
							<td class="text-right"><h5><strong>$6.94</strong></h5></td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td><h3>Total</h3></td>
							<td class="text-right"><h3><strong><?php echo $currency.($total+6.94); ?></strong></h3></td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>
							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-shopping-cart"></span> Update Cart
							</button></td>
							<td>
							<button type="button" class="btn btn-success">
								Proceed to Shipping <span class="glyphicon glyphicon-play"></span>
							</button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	  
      <div class="jumbotron">

		<div class="stepwizard">
			<div class="stepwizard-row">
				<div class="stepwizard-step">
					<button type="button" class="btn btn-default btn-circle">1</button>
					<p>Cart</p>
				</div>
				<div class="stepwizard-step">
					<button type="button" class="btn btn-primary btn-circle">2</button>
					<p>Shipping</p>
				</div>
				<div class="stepwizard-step">
					<button type="button" class="btn btn-default btn-circle" disabled="disabled">3</button>
					<p>Confirm</p>
				</div> 
			</div>
		</div>
	  
      </div>
	  
	
		<div class="row">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
			 <form class="form-horizontal">
				<fieldset>
					<!-- Address form -->
					<legend>Stoixia Paradosis</legend>
				 
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Onomateponimo</label> 
						<div class="col-md-4">
							<input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
						</div>
					</div> 
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Diefthinsi</label> 
						<div class="col-md-4">
							<input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
						</div>
					</div> 
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Poli</label> 
						<div class="col-md-4">
							<input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
						</div>
					</div> 
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Perioxi</label> 
						<div class="col-md-4">
							<input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Taxidromikos Kodikas</label> 
						<div class="col-md-4">
							<input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
						</div>
					</div>
					
					<div class="form-group">
					  <label class="col-md-4 control-label" for="selectbasic">Country</label>
					  <div class="col-md-4">
						<select id="selectbasic" name="selectbasic" class="form-control">
						  <option value="" selected="selected">(please select a country)</option>					
						  <option value="CY">Cyprus</option>
						  <option value="GR">Greece</option>
						</select>
					  </div>
					</div>
			
				</fieldset>
			</form>
		   </div>
		</div>
		
      <div class="jumbotron">

		<div class="stepwizard">
			<div class="stepwizard-row">
				<div class="stepwizard-step">
					<button type="button" class="btn btn-default btn-circle">1</button>
					<p>Cart</p>
				</div>
				<div class="stepwizard-step">
					<button type="button" class="btn btn-default btn-circle">2</button>
					<p>Shipping</p>
				</div>
				<div class="stepwizard-step">
					<button type="button" class="btn btn-success btn-circle" >3</button>
					<p>Confirm</p>
				</div> 
			</div>
		</div>
	  
      </div>
	  
		
	
      <div class="footer">
	  
	  <hr>
	  
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
