
<?php 
session_start();
if(isset($_SESSION["id"]))
include_once "HeaderAfter.php";
else
include_once "HeaderBefore.php";

  ?>

<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
					<?php
					include_once "Classes/Department.php";
					$dept=new Department();
					$rs=$dept->GetAll();
					while($row=mysqli_fetch_assoc($rs))
					{
				?>
						<li class="dropdown mega-dropdown active">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $row["Name"]; ?> <span class="caret"></span></a>				
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
									<?php
										include_once "Classes/Products.php";
										$pro=new Products();
										$rs2=$pro->GetByDepart($row["DepartmentNo"]);
										while($row1=mysqli_fetch_assoc($rs2))
										{	
									?>
										<li><a href="ProductDetails.php?prono=<?php echo $row1["ProductNo"]; ?>"> <?php echo $row1["Name"]; ?> </a></li>
										 
									<?php  } ?>
									</ul>
								</div>                  
							</div>				
						</li>
				<?php } ?>		 
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>

				<?php
					include_once "Classes/Advertising.php";
					$dept=new Advertising();
					$rs=$dept->GetAll();
					while($row=mysqli_fetch_assoc($rs))
					{
				?>
						<li>
							<div class="w3l_banner_nav_right_banner1" style="background-image: url('slider/<?php echo $row["AdvertisingNo"] ?>.jpg');">
								<h3><span><?php echo $row["title"] ?> </span> </h3>
								<div class="more">
									<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						 <?php } ?>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- banner -->

<div  style="margin:0 15px;">

				<?php
					include_once "Classes/Department.php";
					$dept=new Department();
					$rs=$dept->GetAll();
					while($row=mysqli_fetch_assoc($rs))
					{
				?>

				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="Department/<?php echo $row["DepartmentNo"] ?>.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4> <?php echo $row["Name"] ?></h4>
							<p><?php echo $row["details"] ?></p>
						</div>
					</div>
					<a href="AllProducts.php?dno=<?php echo $row["DepartmentNo"] ?>">
					<h4 class="btn btn-success" style="width: 100%;color:white;margin-top: 0;"> 
					   <?php echo $row["Name"] ?>
				    </h4>
					</a>
				</div>
				 
				<?php } ?>

				<div class="clearfix"> </div>
			</div>
 
<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Hot Offers</h3>
			<div class="agile_top_brands_grids">
			<?php
				include_once "Classes/Products.php";
				$dept=new Products();
				$rs=$dept->GetOffers();
				while($row=mysqli_fetch_assoc($rs))
				{	
			?>
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
						<?php
							if($row["Gift"]==1)	
							{
						?>
							<div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
							<?php } ?>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
											<a href="ProductDetails.php?prono=<?php echo $row["ProductNo"]; ?>"><img title=" " alt=" " src="Products/<?php echo $row["ProductNo"]; ?>.png" /></a>		
											<p><?php echo $row["Name"]; ?></p>
											<h4><?php echo $row["Price"]-( $row["Price"]* $row["Discount"]); ?> <span><?php echo $row["Price"]; ?></span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form   method="post">
												 
											<?php
                                    if(isset($_SESSION["id"]))
                                        echo '<input type="submit" name="submit" value="Add to cart" class="button" />';
                                        else 
                                        echo '<a href="login.php"  class="btn btn-danger btn-md" style="width:100%">Add to cart</a>'
                            ?>
												 
													
											</form>
									
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				 
				 <?php } ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //top-brands -->
<!-- fresh-vegetables -->
	<div class="fresh-vegetables">
		<div class="container">
			<h3>Top Products</h3>
			<div class="w3l_fresh_vegetables_grids">
				<div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
					<div class="w3l_fresh_vegetables_grid2">
						<ul>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">All Brands</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="vegetables.html">Vegetables</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="vegetables.html">Fruits</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="drinks.html">Juices</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="pet.html">Pet Food</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="bread.html">Bread & Bakery</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="household.html">Cleaning</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">Spices</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">Dry Fruits</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">Dairy Products</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-9 w3l_fresh_vegetables_grid_right">
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						<div class="w3l_fresh_vegetables_grid1">
							<img src="images/8.jpg" alt=" " class="img-responsive" />
						</div>
					</div>
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						<div class="w3l_fresh_vegetables_grid1">
							<div class="w3l_fresh_vegetables_grid1_rel">
								<img src="images/7.jpg" alt=" " class="img-responsive" />
								<div class="w3l_fresh_vegetables_grid1_rel_pos">
									<div class="more m1">
										<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
									</div>
								</div>
							</div>
						</div>
						<div class="w3l_fresh_vegetables_grid1_bottom">
							<img src="images/10.jpg" alt=" " class="img-responsive" />
							<div class="w3l_fresh_vegetables_grid1_bottom_pos">
								<h5>Special Offers</h5>
							</div>
						</div>
					</div>
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						<div class="w3l_fresh_vegetables_grid1">
							<img src="images/9.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="w3l_fresh_vegetables_grid1_bottom">
							<img src="images/11.jpg" alt=" " class="img-responsive" />
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="agileinfo_move_text">
						<div class="agileinfo_marquee">
							<h4>get <span class="blink_me">25% off</span> on first order and also get gift voucher</h4>
						</div>
						<div class="agileinfo_breaking_news">
							<span> </span>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //fresh-vegetables -->
<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			<div class="w3agile_newsletter_left">
				<h3>sign up for our newsletter</h3>
			</div>
			<div class="w3agile_newsletter_right">
				<form action="#" method="post">
					<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="subscribe now">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter -->

<?php  
include_once "Footer.php";

?>