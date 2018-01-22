<?php $this->load->view('home/header'); ?>
	<section class="inner_section">
    	<section class="inner_header">
			<img src="images/partner-header-bg.jpg" alt="">
			<div class="overlay">
				<h1>Partner with us <span>Interested to partner with us ?</span></h1>
			</div>
		</section>
    	<section class="partner_section">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-6 col-sm-12 col-xs-12">
    					<h3>Interested to partner with us? We just need a few relevant details from you!</h3>
    					<h6>We've done just that while creating many trends for the industry. Now, MyPropertyBoutique would like to join forces with partners who can bring to the table their expertise and personal touch. Reach out to us if you are interested in forming a Joint Venture or in becoming Channel Partners or Investors. </h6>
    					<div class="row">
    						<div class="col-sm-6 col-xs-12">
    							<div class="img_block">
    								<img src="images/partner-img1.jpg" alt="">
    							</div>
							</div>
    						<div class="col-sm-6 col-xs-12">
    							<h4>Builder - Partnership</h4>
    							<p>Lorem ipsum dolor sit amet, ad eam nostro quaestio. Ea viderer ullamcorper vim. Eam ea hinc cibo reprehendunt, ne pri justo sapientem. Pro possit quodsi ut. Mea te graece electram principes, has putent option ei. Vis an nulla rationibus.</p>
    						</div>
    					</div>
    					<div class="row">
    						<div class="col-sm-6 col-xs-12">
    							<div class="img_block">
    								<img src="images/partner-img2.jpg" alt="">
    							</div>
							</div>
    						<div class="col-sm-6 col-xs-12">
    							<h4>Vendor - Partnership</h4>
    							<p>Lorem ipsum dolor sit amet, ad eam nostro quaestio. Ea viderer ullamcorper vim. Eam ea hinc cibo reprehendunt, ne pri justo sapientem. Pro possit quodsi ut. Mea te graece electram principes, has putent option ei. Vis an nulla rationibus.</p>
    						</div>
    					</div>
    				</div>
    				<div class="col-md-6 col-sm-12 col-xs-12">
    					<div class="partner_wrap">
    						<div class="icon">
    							<img src="images/partner-icon1.png" alt="">
    						</div>
    						<h2>Partner With us</h2>
    						<form>
    							<div class="form-group">
    								<div class="styled_select">
    									<select class="form-control">
    										<option selected>Vendor</option>
    										<option>Vendor 1</option>
    										<option>Vendor 2</option>
    										<option>Vendor 3</option>
    										<option>Vendor 4</option>
    									</select>
    								</div>
    							</div>
    							<div class="form-group">
    								<input type="text" class="form-control" placeholder="Name">
    							</div>
    							<div class="form-group">
    								<input type="email" class="form-control" placeholder="E-mail">
    							</div>
    							<div class="form-group">
    								<input type="text" class="form-control" placeholder="Phone">
    							</div>
    							<div class="form-group">
    								<input type="text" class="form-control" placeholder="Company Name">
    							</div>
    							<div class="form-group">
    								<input type="text" class="form-control" placeholder="Website URL">
    							</div>
    							<div class="form-group">
    								<input type="text" class="form-control" placeholder="Message">
    							</div>
    							<div class="form-group">
    								<div class="browse_wrap">
										<div class="pdf_icon">
											<img src="images/pdf-icon.png" alt="">
										</div>
										<div class="career_browse_block">
											<h6>Upload Profile PDF</h6>
											<div class="input-group">
												<input type="file" class="career_browse" id="browse" name="fileupload" onChange="Handlechange();"/>
												<span class="input-group-btn">
													<input type="button" class="btn" value="Browse your file" id="fakeBrowse" onclick="HandleBrowseClick();"/>
												</span>
												<input type="text" class="form-control" id="filename" placeholder="No file selected." readonly/>
											</div>
											<p>PDF files only, Upload Size Limit 2 MB</p>	
										</div>
										<div class="del_btn">
											<a href="#" class="btn">
												<i class="fa fa-close"></i>
												Delete
											</a>
										</div>
    								</div>
    							</div>
    							<div class="form-group">
    								<input type="submit" class="btn" value="Submit">
    							</div>
    						</form>
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>
	</section>
      <?php $this->load->view('home/innerfooter');?>