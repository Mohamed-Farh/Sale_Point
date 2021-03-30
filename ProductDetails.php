<?php 
session_start();
if(isset($_SESSION["id"]))
include_once "HeaderAfter.php";
else
include_once "HeaderBefore.php";
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>
<?php
										include_once "Classes/Products.php";
										$pro=new Products();
										$rs2=$pro->Getbyprono();
										while($row1=mysqli_fetch_assoc($rs2))
										{	
									?>

<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner3">
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			</div>
			<div class="agileinfo_single">
				<h5><?php echo $row1["Name"]; ?></h5>
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="Products/<?php echo $row1["ProductNo"]; ?>.png" alt=" " class="img-responsive" />
				</div>
				<div class="col-md-8 agileinfo_single_right">
					<div class="rating1">
						<span class="starRating">
                            <?php
                                for($x=$row1["rating"];$x>=1;$x--)
                                {
                            ?>
                                  <span class="fa fa-star checked"></span>
							 <?php } ?>

                             <?php
                                for($x=$row1["rating"]+1;$x<=5;$x++)
                                {
                            ?>
                                 <span class="fa fa-star"></span>   
							 <?php } ?>
						</span>
					</div>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p><?php echo $row1["Details"]; ?></p>
					</div>
                    <div class="w3agile_description">
						<h4>Country Orgin :</h4>
						<p><?php echo $row1["Country"]; ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
                        <h4><?php echo $row1["Price"]-( $row1["Price"]* $row1["Discount"]); ?> <span><?php echo $row1["Price"]; ?></span></h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form action="#" method="post">
								 
                            <?php
                                    if(isset($_SESSION["id"]))
                                        echo '<input type="submit" name="submit" value="Add to cart" class="button" />';
                                        else 
                                        echo '<a href="login.php"  class="btn btn-danger btn-lg" style="width:100%">Add to cart</a>'
                            ?>
							 
									
								 
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"></div>

        <?php } ?>
<?php  
include_once "Footer.php";
?>
