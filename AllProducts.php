
<?php 
session_start();
if(isset($_SESSION["id"]))
include_once "HeaderAfter.php";
else
include_once "HeaderBefore.php";
  ?>

<div class="w3l_banner_nav_right" style="width:95%;margin-left:30px;float: none;">
			 
			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
				<h3>All Products</h3>
                <?php
					include_once "Classes/Department.php";
					$dept=new Department();
                    if(isset($_GET["dno"]))
                        $rs=$dept->GetBydno($_GET["dno"]);
                    else
					    $rs=$dept->GetAll();
					while($row=mysqli_fetch_assoc($rs))
					{
			?>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<h6 class='alert alert-success'><?php echo $row["Name"]; ?> </h6>
                    
                    <?php
										include_once "Classes/Products.php";
										$pro=new Products();
										$rs2=$pro->GetByDepart($row["DepartmentNo"]);
										while($row1=mysqli_fetch_assoc($rs2))
										{	
									?>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
                            <?php
							if($row1["Discount"]>0)	
							{
						?>	
                            <img src="images/offer.png" alt=" " class="img-responsive" />
                            <?php } ?>
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="ProductDetails.php?prono=<?php echo $row1["ProductNo"]; ?>"><img src="Products/<?php echo $row1["ProductNo"]; ?>.png" class="img-responsive" /></a>
											<p><?php echo $row1["Name"]; ?></p>
											<h4><?php echo $row1["Price"]-( $row1["Price"]* $row1["Discount"]); ?> <span><?php echo $row1["Price"]; ?></span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												 
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
				 <?php } ?>
                
			</div>
		</div>
		<div class="clearfix"></div>

<?php  
include_once "Footer.php";

?>