<br><br><br>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

	<!-- Section 1 -->
	<section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo base_url(); ?>assets/homepagestyles/images/University.png); background-repeat: no-repeat; height: 100%;">
		<div class="container">

			<div class="row align-items-center justify-content-center site-hero-sm-inner">

				<div class="col-md-7 text-center">
					<div class="mb-5 element-animate">

						<h1 class="mb-2">Registration</h1>
              			<p class="bcrumb"><a href="<?php echo base_url(); ?>home" style="color: #11cbd7">Home</a> <span class="sep ion-android-arrow-dropright px-2"></span>  <span class="current">Registration</span></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--  End Section 1 -->
	<!-- Section 2 -->
	<section class="site-section element-animate">
		<div class="container">
			<div class="row">
				<div class="col-md-12 pr-md-5">
					<p class="send_info_warning" style="display: none;"></p>
					<!-- Form 1 -->
					<form class="Personal_Information">
						<h1>Personal Information</h1>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>LRN</label>
 								<input type="text" class="form-control" id="lrn">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Last Name</label>
								<input type="text" class="form-control" id="lname">
							</div>
							<div class="col-md-4 form-group">
								<label>First Name</label>
								<input type="text" class="form-control" id="fname">
							</div>
							<div class="col-md-4 form-group">
								<label>Middle Name</label>
								<input type="text" class="form-control" id="mname">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Sex</label>
								<select class="form-control" id="sex">
									<option selected disabled>Select</option>
									<option>Male</option>
									<option>Female</option>
								</select>
							</div>
							<div class="col-md-4 form-group">
	 							<label>Birth Date</label>
	 							<div class="input-group date">
							        <input type="text" class="form-control" id="bday" placeholder="MM/DD/YYYY">
							    </div>
	 						</div>
	 						<div class="col-md-4 form-group">
	 							<label>Birth Place</label>
	 							<input type="text" class="form-control" id="bplace">
	 						</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Age</label>
								<input type="text" class="form-control" id="age">
							</div>
							<div class="col-md-4 form-group">
								<label>Height</label>
								<input type="text" class="form-control" placeholder="Height in centimeter" id="height">
							</div>
							<div class="col-md-4 form-group">
								<label>Weight</label>
								<input type="text" class="form-control" placeholder="Weight in centimeter" id="weight">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
	 							<label>Language</label>
	 							<input type="text" class="form-control py-2" placeholder="Language/Dialect" id="language">
	 						</div>
	 						<div class="col-md-4 form-group">
	 							<label>Religion</label>
	 							<select class="form-control py-2" id="religion">
	 								<option selected disabled>Select</option>
	 								<option value="Catholic">Catholic</option>
	 								<option value="Christian">Christian</option>
	 								<option value="Iglesia">Iglesia</option>
	 								<option value="Muslim">Muslim</option>
	 								<option value="Buddhist">Buddhist</option>
	 								<option value="El Shaddai">El Shaddai</option>
	 								<option value="Baptist">Baptist</option>
	 								<option value="Protestant">Protestant</option>
	 								<option value="Methodist">Methodist</option>
	 								<option value="Ang Dating Daan">Ang Dating Daan</option>
	 								<option value="Jehovah's Witnessess">Jehovah's Witnessess</option>
	 							</select>
	 						</div>
	 						<div class="col-md-4 form-group">
	 							<label>Ethnic Group</label>
	 							<select class="form-control py-2" id="ethnic_group">
	 								<option selected disabled>Select</option>
	 								<option value="Filipino">Filipino</option>
	 								<option value="Aeta">Aeta</option>
	 								<option value="Visayans">Visayans</option>
	 								<option value="Igorot">Igorot</option>
	 								<option value="Lumad">Lumad</option>
	 								<option value="Bicolano">Bicolano</option>
	 								<option value="Tagalog">Tagalog</option>
	 								<option value="Mangyan">Mangyan</option>
	 								<option value="Ilocano">Ilocano</option>
	 								<option value="Maranao">Maranao</option>
	 								<option value="Waray">Waray</option>
	 								<option value="Pangasinan">Pangasinan</option>
	 								<option value="Zamboangueño">Zamboangueño</option>
	 							</select>
	 						</div>	
						</div>
						<div class="row">
	 						<div class="col-md-4 form-group">
	 							<label>Telephone Number</label>
	 							<input type="text" class="form-control py-2" id="telephone">
	 						</div>
	 						<div class="col-md-4 form-group">
	 							<label>Mobile Number</label>
	 							<input type="text" class="form-control py-2" id="mobile">
	 						</div>
	 						<div class="col-md-4 form-group">
	 							<label>Email Address</label>
	 							<input type="email" class="form-control py-2" id="email">
	 						</div>
	 					</div>
					</form>
					<!-- end of Form 1 -->
					<!-- form2 -->
					<form class="teacher_address">
						<div class="row">
	 						<h1>Teacher's Address</h1>
	 					</div>
						<div class="row">
							<div class="col-md-4 form-group">
	 							<label>House#/Street/Blk/Lot/Subdivision/Brgy</label>
	 							<input type="text" class="form-control" id="brgy">
	 						</div>
	 						<div class="col-md-4">
	 							<label>Municipality</label>
	 							<input type="text" class="form-control" id="municipality">
	 						</div>
	 						<div class="col-md-4">
	 							<label>Province</label>
	 							<input type="text" class="form-control" id="province">
	 						</div>
						</div>
						<div class="row">
							<h1>Guardian's Information</h1>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Last Name</label>
								<input type="text" class="form-control" id="g_lname">
							</div>
							<div class="col-md-4 form-group">
								<label>first Name</label>
								<input type="text" class="form-control" id="g_fname">
							</div>
							<div class="col-md-4 form-group">
								<label>Middle Name</label>
								<input type="text" class="form-control" id="g_mname">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Relationship</label>
								<input type="text" class="form-control" id="g_relationship">
							</div>
							<div class="col-md-4 form-group">
								<label>Contact Number</label>
								<input type="text" class="form-control" id="g_contact">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
	 							<label>House#/Street/Blk/Lot/Subdivision/Brgy</label>
	 							<input type="text" class="form-control" id="g_brgy">
	 						</div>
	 						<div class="col-md-4 form-group">
	 							<label>Municipality</label>
	 							<input type="text" class="form-control" id="g_municipality">
	 						</div>
	 						<div class="col-md-4 form-group">
	 							<label>Province</label>
	 							<input type="text" class="form-control" id="g_province">
	 						</div>
						</div>		
					</form>
					<!-- end of form2 -->
					<!-- form 3 -->
					<form class="Edcuational_Background">
						<div class="row">
							<h1>Educational Background</h1>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>School Name</label>
								<input type="text" placeholder="School Name" class="form-control" id="school_name">
							</div>
							<div class="col-md-4 form-group">
								<label>Degree</label>
								<select class="form-control" id="degree">
									<option selected disabled>Select</option>
									<option>Bachelor of Science</option>
									<option>Bachelor of Arts</option>
									<option>Bachelor in Secondary Education</option>
									<option>Bachelor in Elementary Education</option>
									<option>Bachelor in Secondary Education Major in</option>
								</select>
							</div>
							<div class="col-md-4 form-group">
								<label>Course</label>
								<input type="text" placeholder="Course" class="form-control" id="course">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>House #/Street/Blk/Lot/Subdivision/Brgy</label>
								<input type="text" placeholder="House #/Street/Blk/Lot/Subdivision/Brgy" class="form-control" id="s_brgy">
							</div>
							<div class="col-md-4 form-group">
								<label>Municipality</label>
								<input type="text" placeholder="Municipality" class="form-control" id="s_municipality">
							</div>
							<div class="col-md-4 form-group">
								<label>Province</label>
								<input type="text" placeholder="Province" class="form-control" id="s_province">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Academic year from:</label>
								<select class="form-control" id="year_from">
									<option selected disabled>Select</option>
									<?php
										for($year =date("Y"); $year >=1950; $year--){
											?> 
												<option value="<?php echo $year ?>"><?php echo $year ?></option>
											<?php
										} 
									?>
								</select>
							</div>
							<div class="col-md-4 form-group">
								<label>To:</label>
								<select class="form-control" id="year_to">
									<option selected disabled>Select</option>
									<?php
										for($year =date("Y")+1; $year >=1950; $year--){
											?> 
												<option value="<?php echo $year ?>"><?php echo $year ?></option>
											<?php
										} 
									?>
								</select>
							</div>
						</div>
					</form>
					<!-- end of form 3 -->
					<div class="form-group">
						<button class="btn btn-primary sendBtn btn-lg">Send</button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end of Section 2 -->

	<script type="text/javascript">
		$('#bday').datepicker();
	</script>
