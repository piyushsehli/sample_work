<!DOCTYPE HTML>
<html>
<head>
	<title>MLA NAKODAR</title>
	<?php require_once("headincludes.php"); ?>
</head>
<body>

<?php require_once("header.php"); ?>

<!-- content -->
<div class="container">
<div class="main">
	<div class="row content_top">
		<div class="col-md-9 content_left">
	<!-- start slider -->
    <div id="fwslider">
        <div class="slider_container">
            <div class="slide"> 
                <!-- Slide image -->
                    <img src="images/slider1.jpg" class="img-responsive" alt=""/>
                <!-- /Slide image -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
                <img src="images/slider2.jpg" class="img-responsive" alt=""/>
            </div>
            <div class="slide">
                <img src="images/slider3.jpg" class="img-responsive" alt=""/>
            </div>
            <!--/slide -->
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
    </div>

	<!-- end  slider -->
		</div>
		<div class="col-md-3 sidebar">
		<div class="grid_list">
			<a href="details.html"> 
				<div class="grid_img"> 
					<img src="images/grid_pic1.jpg" class="img-responsive" alt=""/>
				</div>
				<div class="grid_text left">
					<h3><a href="#">extra 35<sub>%</sub> off</a></h3>
					<p>on select merchandise</p>
				</div>
				<div class="clearfix"></div>
			</a>	
			</div>	
		<div class="grid_list">
			<a href="details.html"> 
				<div class="grid_text-middle">
					<h3><a href="#">celina unpluged</a></h3>
					<p>on select merchandise</p>
				</div>
				<div class="grid_img last"> 
					<img src="images/grid_pic2.jpg" class="img-responsive" alt=""/>
				</div>
				<div class="clearfix"></div>
			  </a>
			</div>				
		<div class="grid_list"> 
			<a href="details.html">
				<div class="grid_img"> 
					<img src="images/grid_pic3.jpg" class="img-responsive" alt=""/>
				</div>
				<div class="grid_text left">
					<h3><a href="#">active gear store</a></h3>
					<p>shop now</p>
				</div>
				<div class="clearfix"></div>
			</a>
			</div>				
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- start content -->
	<div class="content">
		<div class="content_text">
			<h4><a href="#">SERVICES </a></h4>
			<p>All services that you need regarding searching places.</p>
		</div>
		<!-- grids_of_3 -->
		<div class="row grids">
			<div class="col-md-3 grid1">
			  <a href="details.html">
				<img src="images/pic1.jpg" class="img-responsive" alt=""/>
				<div class="look">			
					<h4>Hotels</h4>
					<p><?php
						$id="hotels";
						echo "<a href='search.php?search=$id'>Click to view</a>";
					?></p>
				</div></a>
			</div>
			<div class="col-md-3 grid1">
			  <a href="details.html">
				<img src="images/pic2.jpg" class="img-responsive" alt=""/>
				<div class="look">			
					<h4>Suvidha Kedra</h4>
					<p>Click to view</p>
				</div></a>
			</div>
			<div class="col-md-3 grid1">
			  <a href="details.html">
				<img src="images/pic3.jpg" class="img-responsive" alt=""/>
				<div class="look">			
					<h4>Hospitals</h4>
					<p>Click to view</p>
				</div></a>
			</div>
			<div class="col-md-3 grid1">
			  <a href="details.html">
				<img src="images/pic4.jpg" class="img-responsive" alt=""/>
				<div class="look">			
					<h4>Govt. Offices</h4>
					<p>Click to view</p>
				</div></a>
			</div>
		</div>
		<!-- end grids_of_3 -->
	</div>
	<!-- end content -->
</div>
</div>

<!-- footer_top -->
<?php require_once("footer.php"); ?>
<!-- footer -->
</body>
</html>