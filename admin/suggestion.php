<?php
	include('header.php');
  include('../config.php');
?>
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php
					include('headermenu.php');
				?>
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
<?php
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM `suggestions` WHERE ref_no='$id'";
    $feed=new Task();
    mysqli_query($feed->con, $query);
  }
?>
<!--market updates updates-->
	 <div class="market-updates">
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-8 market-update-left">
						<h3>83</h3>
						<h4>Registered User</h4>
						<p>Other hand, we denounce</p>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-file-text-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-2">
				 <div class="col-md-8 market-update-left">
					<h3>135</h3>
					<h4>Daily Visitors</h4>
					<p>Other hand, we denounce</p>
				  </div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-8 market-update-left">
						<h3>23</h3>
						<h4>New Messages</h4>
						<p>Other hand, we denounce</p>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-envelope-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
<!--market updates end here-->
<!--mainpage chit-chating-->
<div class="chit-chat-layer1">
	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Recent Suggestions
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>#ref_no</th>
                                      <th>Name</th>
                                      <th>Email</th>                                   
                                      <th>Gender</th>                                  
                                      <th>Contact Number</th>
                                      <th>Subject</th>
                                      <th>Details</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php
                                
                                $sug=new Task();
                                $query="SELECT * from suggestions";
                                $res=mysqli_query($sug->con, $query);
                                while($row=mysqli_fetch_assoc($res)){
                                $id=$row['ref_no'];
                                
                              ?>
                                <tr>
                                  <td><?=$row['ref_no'];?></td>                               
                                  <td><?=$row['firstname'].' '.$row['lastname'];?></td>                               
                                  <td><?=$row['email'];?></td>                               
                                  <td><?=$row['gender'];?></td>                               
                                  <td><?=$row['number'];?></td>                               
                                  <td><?=$row['subject'];?></td>                               
                                  <td><?=$row['details'];?></td>                               
                                  <?php echo "<td><a href='suggestion.php?id=$id'><span class='label label-danger'>Delete</span></a></td>";?>                             
                                                             
                              </tr>
                              <?php
                                }
                              ?>
                              
                          </tbody>
                      </table>
                  </div>
             </div>
      </div>     
      <div class="clearfix"> </div>
</div>

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <?php
    	include('sidebar.php');
    ?>
	<div class="clearfix"> </div>
</div>
<?php 
	include('footer.php');
?>               