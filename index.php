<?php require_once("header.php"); ?>
<div id="home" class="rsbanner">
		<div class="banner-info">
<div class="banner-text">
				<!-- banner Slider starts Here -->
				<script src="js/responsiveslides.min.js"></script>
				<script>
					// You can also use "$(window).load(function() {"
					$(function () {
					  // Slideshow 3
					  $("#slider3").responsiveSlides({
						auto: true,
						pager: true,
						nav: false,
						speed: 500,
						namespace: "callbacks",
						before: function () {
						  $('.events').append("<li>before event fired.</li>");
						},
						after: function () {
						  $('.events').append("<li>after event fired.</li>");
						}
					  });
				
					});
				</script>
				<!-- //End-slider-script -->
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<div class="bnr-agileinfo">
								<h2>Get a new look from us</h2>	
								<h3>If you’re looking for massage therapy in Hamilton just give us a call because looking after aching muscles is what I’ve been doing for the past years</h3>	
								<?php if(isset($_SESSION["email"])){									
									echo'<div class="rslsmore">
									<a href="booking.php" class="button-pipaluk button--inverted">Book Now</a>
								</div>';
 								}else{
									echo'<div class="rslsmore">
									<a href="login_register.php" class="button-pipaluk button--inverted">Login/Register</a>
								</div>';

								 } ?>
									
							</div>	
						</li>
						<li>
							<div class="bnr-agileinfo">
								<h4>Convenient</h4>	
								<h3>Locasted just 10 minutes from the CBD with easy parking</h3>	
								<?php if(isset($_SESSION["email"])){									
									echo'<div class="rslsmore">
									<a href="booking.php" class="button-pipaluk button--inverted">Book Now</a>
								</div>';
 								}else{
									echo'<div class="rslsmore">
									<a href="login_register.php" class="button-pipaluk button--inverted">Login/Register</a>
								</div>';

								 } ?>	
							</div>	
						</li>
						<li>
							<div class="bnr-agileinfo">
								<h4>Well Equipped</h4>	
								<h3>Ergonomically designed massage tables for your comfort</h3>	
								<?php if(isset($_SESSION["email"])){									
									echo'<div class="rslsmore">
									<a href="booking.php" class="button-pipaluk button--inverted">Book Now</a>
								</div>';
 								}else{
									echo'<div class="rslsmore">
									<a href="login_register.php" class="button-pipaluk button--inverted">Login/Register</a>
								</div>';

								 } ?>	
							</div>	
						</li>
					</ul>
				</div>
			</div>	
			</div>
			</div>
	<!-- welcome -->
	<div class="welcome rs">
		<div class="container">
			<div class="col-md-5 welcome-agileleft">
				<img src="images/img2.jpg" alt=""/>
			</div>
			<div class="col-md-7 welcome-right">
				<h3 class="wthree-title">Welcome!</h3>
				<p>Let me work with you to develop a massage treatment plan that keeps you in peak condition leading up to, and beyond your event.</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //welcome -->
	<!-- tabs -->
	<div class="agileits-tabs">
		<div class="container">
			<h3 class="wthree-title">Massage Types</h3>
			<div class="tabs-row">
				<div class="col-sm-3 col-md-2 tab-grid-left"> <!-- required for floating -->
					<!-- Nav tabs -->
					 <ul class="nav nav-tabs rs-agileits-tabs">
						<li class="active"><a href="#Tab1" data-toggle="tab">Deep Tissue Massage</a></li>
						<li><a href="#Tab2" data-toggle="tab">Sports Massage</a></li>
						<li><a href="#Tab3" data-toggle="tab">Relaxation Massage</a></li>
					</ul>
				</div>
				<div class="col-sm-9 col-md-10 tab-grid-right">
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="Tab1">
							<div class="agileits-text">
								<div class="col-md-6 care-rslimg"> 
									<img src="images/g2.jpg" alt=""/>
								</div>
								<div class="col-md-6 care-rstext"> 
									<h4>Deep Tissue Massage</h4>
									<p>Deep tissue massage is often used in the process of recovering from 
									injury or illness your body may experience unwanted aches and pains, 
									your deep tissue massage program will be designed to work specifically on those areas to help relieve tension, 
									restore mobility, and eliminate pain. </p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="tab-pane" id="Tab2">
							<div class="agileits-text">
								<div class="col-md-6 care-rslimg"> 
									<img src="images/g2.jpg" alt=""/>
								</div>
								<div class="col-md-6 care-rstext"> 
									<h4>Sports Massage</h4>
									<p>Sports and remedial massage is an effective and beneficial form of physical therapy, 
									not only for active sports people, or those requiring therapy after a soft tissue injury, 
									but also for those seeking relief from muscular tension or simply to maintain healthy muscles. </p>
									
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="tab-pane" id="Tab3">
							<div class="agileits-text">
								<div class="col-md-6 care-rslimg"> 
									<img src="images/g2.jpg" alt=""/>
								</div>
								<div class="col-md-6 care-rstext"> 
									<h4>Relaxation Massage</h4>
									<p>Relaxation massage, often referred to as Swedish massage, uses a variety of techniques to help you unwind and rejuvenate. 
									During a relaxation massage I will use pressure ranging from light to firm to promote relaxation, and ease muscle tension.</p>
									
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div> 
		</div>
	</div>
	<!-- //tabs -->
	
	<!-- slid -->
	<div class="slid" id="booking">
		<div class="container">	
			<h3 class="wthree-title">Pricing</h3>
			<div class="slid-row rs-agileits">
				<div class="col-md-4 slid-grids">
					<h4>Take a short break</h4>
					<h3>$40</h3>
					<h5>30 minutes</h5>
					<?php if(isset($_SESSION["email"])){									
									echo'<div class="rslsmore">
									<a href="booking.php" class="button-pipaluk button--inverted"> Book Now</a>
								</div>';
 								}else{
									echo'<div class="rslsmore">
									<a href="login_register.php" class="button-pipaluk button--inverted">Login/register</a>
								</div>';

								 } ?>
						
				</div>
				<div class="col-md-4 slid-grids">
					<h4>Deep relaxing</h4>
					<h3>$75</h3>
					<h5>60 minutes</h5>
					<?php if(isset($_SESSION["email"])){									
									echo'<div class="rslsmore">
									<a href="booking.php" class="button-pipaluk button--inverted"> Book Now</a>
								</div>';
 								}else{
									echo'<div class="rslsmore">
									<a href="login_register.php" class="button-pipaluk button--inverted">Login/register</a>
								</div>';

								 } ?>	
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //slid -->
<?php require_once("footer.php"); ?>
