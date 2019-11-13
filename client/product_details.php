<?php
$id = $_GET["id"];
include 'src/include/db.php';
?>
<?
if (isset($_POST["submit1"])) {
    $d = 0;
    if (is_array($_COOKIE['item'])) // this is for checking cookies available or not
    {

        foreach ($_COOKIE['item'] as $name => $value) {
            $d = $d + 1;
        }
        $d = $d + 1;
    } else {
        $d = $d + 1;
    }

    // to get item description from table
    $res3 = mysqli_query($db, "SELECT * FROM product WHERE id={$id}");
    while ($row3 = mysqli_fetch_array($res3)) {
        $img1 = $row3["product_image"];
        $nm = $row3["product_name"];
        $prize = $row3["product_price"];
        $qty = "1";
        $total = $prize * $qty;
    }

    if (is_array($_COOKIE['item'])) // this is for check cookies are available or nor
    {
        foreach ($_COOKIE['item'] as $name1 => $value) // this is for looping as per cookies if 3 cookies then loop move
        {
            $values11 = explode("__", $value);
            $found = 0;
            if ($img1 == $values11[0]) // this is for check same cookies available or not if available then increase qty
            {
                // check here for quantity add in the cart for more than available quantity
                $found = $found + 1;
                $qty = $values11[3] + 1;

                $tb_qty;
                $res = mysqli_query($db, "SELECT * FROM product WHERE product_image='$img1'");
                while ($row = mysqli_fetch_array($res)) {
                    $tb_qty = $row["product_qty"];
                }

                if ($tb_qty < $qty) {
                    ?>
<script type="text/javascript">
                        alert("this much quantity not available");
                    </script>
<?php
                } else {

                    $total = $values11[2] * $qty;
                    setcookie("item[$name1]", $img1 . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total, time() + 1800);
                }
            }
        }

        if ($found == 0) {
            $tb_qty;
            $res = mysqli_query($db, "SELECT * FROM product WHERE product_image='$img1'");
            while ($row = mysqli_fetch_array($res)) {
                $tb_qty = $row["product_qty"];
            }

            if ($tb_qty < $qty) {
                ?>
<script type="text/javascript">
                    alert("this much quantity not available");
                </script>
<?php
            } else {

                setcookie("item[$d]", $img1 . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total, time() + 1800); // new
            }
        }
    } else {
        $tb_qty;
        $res = mysqli_query($db, "SELECT * FROM product WHERE product_image='$img1'");
        while ($row = mysqli_fetch_array($res)) {
            $tb_qty = $row["product_qty"];
        }

        if ($tb_qty < $qty) {
            ?>
<script type="text/javascript">
                alert("this much quantity not available");
            </script>
<?php
        } else {
            setcookie("item[$d]", $img1 . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total, time() + 1800); // new
        }
    }
}

?>
<?php include 'src/include/header.php';?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>

						<div class="panel-group category-products" id="accordian">
							<!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian"
											href="#sportswear"> <span class="badge pull-right"><i
												class="fa fa-plus"></i></span> Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Nike </a></li>
											<li><a href="">Under Armour </a></li>
											<li><a href="">Adidas </a></li>
											<li><a href="">Puma</a></li>
											<li><a href="">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian"
											href="#mens"> <span class="badge pull-right"><i
												class="fa fa-plus"></i></span> Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
											<li><a href="">Armani</a></li>
											<li><a href="">Prada</a></li>
											<li><a href="">Dolce and Gabbana</a></li>
											<li><a href="">Chanel</a></li>
											<li><a href="">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian"
											href="#womens"> <span class="badge pull-right"><i
												class="fa fa-plus"></i></span> Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#">Kids</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#">Fashion</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#">Households</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#">Interiors</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#">Clothing</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#">Bags</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#">Shoes</a>
									</h4>
								</div>
							</div>
						</div>
						<!--/category-products-->

						<div class="brands_products">
							<!--brands_products-->
							<h2>Brands</h2>

							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne
									</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Gr�ne Erde
									</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro
									</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill
									</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly
									</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn
									</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>R�sch
											creative culture
									</a></li>
								</ul>
							</div>
						</div>
						<!--/brands_products-->

						<div class="price-range">
							<!--price-range-->
							<h2>Price Range</h2>

							<div class="well">
								<input type="text" class="span2" value="" data-slider-min="0"
									data-slider-max="600" data-slider-step="5"
									data-slider-value="[250,450]" id="sl2"><br /> <b>$ 0</b> <b
									class="pull-right">$ 600</b>
							</div>
						</div>
						<!--/price-range-->

						<div class="shipping text-center">
							<!--shipping-->
							<img src="src/images/home/shipping.jpg" alt="" />
						</div>
						<!--/shipping-->

					</div>
				</div>

            <?php
            $res = mysqli_query($db, "SELECT * FROM product WHERE id=$id");
            while ($row = mysqli_fetch_array($res)) {
                ?>

            <!-- here -->


				<div class="col-sm-9 padding-right">
					<div class="product-details">
						<!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="src/images/<?php echo $row["product_image"]; ?>"
									alt="" />

							</div>


						</div>


						<form name="form1" action="cart.php" method="post">
							<div class="col-sm-7">
								<div class="product-information">
									<!--/product-information-->
									<img src="src/images/product-details/new.jpg"
										class="newarrival" alt="" />

									<h2><?php echo $row["product_name"]; ?></h2>

									<p>Web ID: <?php echo $row["id"]; ?></p>

									<span> <span>US $<?php echo $row["product_price"]; ?></span> <label>Quantity:</label>
										<input type="text" value="1" />
										<button type="submit" name="submit1"
											class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i> Add to cart
										</button>
									</span>

									<p>
										<b>Availability:</b> <?php echo $row["product_qty"]; ?></p>

									<p>
										<b>Condition:</b> New
									</p>


								</div>
								<!--/product-information-->
							</div>
					
					</div>
					<!--/product-details-->
					</form>
					<!-- end here-->

                <?php
            }
            ?>


                <div class="category-tab shop-details-tab">
						<!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews
										(5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="src/images/home/gallery1.jpg" alt="" />

												<h2>$56</h2>

												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="src/images/home/gallery2.jpg" alt="" />

												<h2>$56</h2>

												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="src/images/home/gallery3.jpg" alt="" />

												<h2>$56</h2>

												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="src/images/home/gallery4.jpg" alt="" />

												<h2>$56</h2>

												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="companyprofile">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="src/images/home/gallery1.jpg" alt="" />

												<h2>$56</h2>

												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="src/images/home/gallery3.jpg" alt="" />

												<h2>$56</h2>

												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="src/images/home/gallery2.jpg" alt="" />

												<h2>$56</h2>

												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="src/images/home/gallery4.jpg" alt="" />

												<h2>$56</h2>

												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="tag">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="src/images/home/gallery1.jpg" alt="" />

												<h2>$56</h2>

												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="src/images/home/gallery2.jpg" alt="" />

												<h2>$56</h2>

												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="src/images/home/gallery3.jpg" alt="" />

												<h2>$56</h2>

												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="src/images/home/gallery4.jpg" alt="" />

												<h2>$56</h2>

												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade active in" id="reviews">
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>Allan</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2018</a></li>
									</ul>
									<p>The product above is a great one, for more products, you can
										keep on browsing otherwise we only offer the best products.</p>

									<p>
										<b>Write Your Review</b>
									</p>

									<form action="#">
										<span> <input type="text" placeholder="Your Name" /> <input
											type="email" placeholder="Email Address" />
										</span>
										<textarea name=""></textarea>
										<b>Rating: </b> <img
											src="src/images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit</button>
									</form>
								</div>
							</div>

						</div>
					</div>
					<!--/category-tab-->

					<div class="recommended_items">
						<!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>

						<div id="recommended-item-carousel" class="carousel slide"
							data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="src/images/home/recommend1.jpg" alt="" />

													<h2>$56</h2>

													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart">
														<i class="fa fa-shopping-cart"></i>Add to cart
													</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="src/images/home/recommend2.jpg" alt="" />

													<h2>$56</h2>

													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart">
														<i class="fa fa-shopping-cart"></i>Add to cart
													</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="src/images/home/recommend3.jpg" alt="" />

													<h2>$56</h2>

													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart">
														<i class="fa fa-shopping-cart"></i>Add to cart
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="src/images/home/recommend1.jpg" alt="" />

													<h2>$56</h2>

													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart">
														<i class="fa fa-shopping-cart"></i>Add to cart
													</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="src/images/home/recommend2.jpg" alt="" />

													<h2>$56</h2>

													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart">
														<i class="fa fa-shopping-cart"></i>Add to cart
													</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="src/images/home/recommend3.jpg" alt="" />

													<h2>$56</h2>

													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart">
														<i class="fa fa-shopping-cart"></i>Add to cart
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="left recommended-item-control"
								href="#recommended-item-carousel" data-slide="prev"> <i
								class="fa fa-angle-left"></i>
							</a> <a class="right recommended-item-control"
								href="#recommended-item-carousel" data-slide="next"> <i
								class="fa fa-angle-right"></i>
							</a>
						</div>
					</div>
					<!--/recommended_items-->

				</div>
			</div>
		</div>
	</section>

	<footer id="footer">
		<!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2>
								<span></span>Happy Shop
							</h2>

							<p>You will love this product, Only quality is what we give.</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="src/images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>

								<p>Circle of Hands</p>

								<h2>24 DEC 2018</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="src/images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>

								<p>Circle of Hands</p>

								<h2>24 DEC 2018</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="src/images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>

								<p>Circle of Hands</p>

								<h2>24 DEC 2018</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="src/images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>

								<p>Circle of Hands</p>

								<h2>24 DEC 2018</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="src/images/home/map.png" alt="" />

							<p>Hangzhou China</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ�s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">T-Shirt</a></li>
								<li><a href="">Mens</a></li>
								<li><a href="">Womens</a></li>
								<li><a href="">Gift Cards</a></li>
								<li><a href="">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								<li><a href="">Refund Policy</a></li>
								<li><a href="">Billing System</a></li>
								<li><a href="">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Store Location</a></li>
								<li><a href="">Affillate Program</a></li>
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>

							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default">
									<i class="fa fa-arrow-circle-o-right"></i>
								</button>
								<p>
									Get the most recent updates from <br />our site and be updated
									your self...
								</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright � 2019 Shop Mart Inc. All rights
						reserved.</p>

					<p class="pull-right">
						Designed by <span><a target="_blank" href="#">Me
								Inc</a></span>
					</p>
				</div>
			</div>
		</div>

	</footer>
	<!--/Footer-->


	<script src="src/js/jquery.js"></script>
	<script src="src/js/price-range.js"></script>
	<script src="src/js/jquery.scrollUp.min.js"></script>
	<script src="src/js/bootstrap.min.js"></script>
	<script src="src/js/jquery.prettyPhoto.js"></script>
	<script src="src/js/main.js"></script>
</body>
</html>