<?php $this->load->view('home/header'); ?>
	<section class="inner_section paddingnone">
    	<section class="inner_header">
			<img src="images/emi-calc-header-bg.jpg" alt="">
			<div class="overlay">
				<h1>EMI Calculator <span>Home loan Calculator</span></h1>
			</div>
		</section>
    	<section class="emi_calc_section">
    		<div class="container">
    			<h2>
    				<img src="images/calc2.png" alt="">
    				EMI calculator<span>for Home Loans</span>
    			</h2>
    			<div class="row">
    				<div class="col-md-8 col-sm-12 col-xs-12">
    					<div class="calc_price_range">
    						<div class="row">
    							<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
    								<label>Home Loan Amount <i class="fa fa-rupee"></i></label>
    							</div>
    							<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
    								<div class="relative">
    									<input type="text" class="form-control" value="50,00,000">
    									<i class="fa fa-rupee"></i>
    								</div>
    							</div>
    							<div class="col-xs-12">
    								<input id="amount-range" type="text" ticks-snap-bounds="30">
    							</div>
    						</div>
    						<div class="row">
    							<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
    								<label>Interest Rate (P.A)</label>
    							</div>
    							<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
    								<div class="relative">
    									<input type="text" class="form-control" value="8.5">
    									<i class="fa fa-percent"></i>
    								</div>
    							</div>
    							<div class="col-xs-12">
    								<input id="emi-int" type="text" ticks-snap-bounds="30">
    							</div>
    						</div>
    						<div class="row">
    							<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
    								<label>15 Years</label>
    							</div>
    							<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
    								<div class="relative">
    									<input type="text" class="form-control" value="15 Years">
    									<i class="fa fa-clock-o"></i>
    								</div>
    							</div>
    							<div class="col-xs-12">
    								<input id="loan-tenure" type="text" ticks-snap-bounds="30">
    							</div>
    						</div>
    					</div>
    					<div class="calc_progressbar">
    						<div class="row">
    							<div class="col-sm-6 col-xs-12">
    								<ul class="calc_list2">
    									<li>
    										<span class="circle"></span>
    										Principal Amount
    										<span class="prce"><i class="fa fa-rupee"></i>50,00,000</span>
    									</li>
    									<li>
    										<span class="circle"></span>
    										Total Interest Payable
    										<span class="prce"><i class="fa fa-rupee"></i>38,62,656</span>
    									</li>
    									<li>
    										<span class="circle"></span>
    										Total Payment (Principal + Interest)
    										<span class="prce"><i class="fa fa-rupee"></i>88,62,656</span>
    									</li>
    								</ul>
    							</div>
    							<div class="col-sm-6 col-xs-12">
    								<div class="text-center">
										<div class="progress-bar-circle" data-percent="40" data-duration="1000" data-color="#3a5a82,#cd2c2c">
											<span class="progerss_data">
												<h4>
													EMI
													<span><i class="fa fa-rupee"></i>49,237</span>
												</h4>
											</span>
										</div>
                                		<div class="btn_wrap">
                                			<a href="#" class="btn">Apply Now</a>
                                		</div>
                                	</div>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div class="col-md-4 col-sm-12 col-xs-12">
    					<div class="calc_right">
    						<h3>How to Use EMI Calculator?</h3>
    						<p>With colourful charts and instant results, our EMI Calculator is easy to use, intuitive to understand and is quick to perform. You can calculate EMI for home loan, car loan, personal loan, education loan or any other fully amortizing loan using this calculator.</p>
    						<h3>Enter the following information in the EMI Calculator:</h3>
    						<ul class="calc_list">
								<li>
									<i class="fa fa-rupee"></i>
									Loan amount you wish to avail
								</li>
   								<li>
									<i class="fa fa-percent"></i>
									Loan term (months or years)
								</li>
								<li>
									<i class="fa fa-clock-o"></i>
									Rate of interest (percentage)
								</li>
    						</ul>
    						<p>Use the slider to adjust the values in the EMI calculator form. If you need to enter more precise values, you can type the values directly in the relevant boxes provided above. As soon as the values are changed using the slider (or hit the ‘tab’ key after entering the values directly in the input fields), EMI calculator will re-calculate your monthly payment (EMI) amount.</p>
    						<p>A pie chart depicting the break-up of total payment (i.e., total principal vs. total interest payable) is also displayed. It displays the percentage of total interest versus principal amount in the sum total of all payments made against the loan. </p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>
	</section>
    <?php $this->load->view('home/innerfooter');?>