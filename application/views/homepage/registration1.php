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
	<!-- section 2 -->
	<section class="site-section element-animate">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 form-group">
					<button class="btn btn-success new">New Student</button>
					<button class="btn btn-success old">Old Student</button>
					<button class="btn btn-success transferee">Transferee Student</button>
				</div>
				<div class="col-md-12 pr-md-5">
					<p class="send_info_warning" style="display: none;"></p>
					<!-- form 1 -->
					<form class="new_student" style="display: none;">
						<h1>New Student</h1>
						<div class="row">
							
							<div class="col-md-4 form-group">
								<label>Course to Enroll</label>
								<select class="form-control" id="new_course">
									<option selected disabled>Select</option>
									<?php $key ?>
									<?php foreach ($courses as $key => $value): ?>
										<option value="<?php echo $value->course_name; ?>"><?php echo $value->course_name; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Academic Level</label>
								<input disabled type="text" class="form-control" value="Grade 11" id="new_acad_level">
							</div>
							<div class="col-md-4 form-group">
								<label>Semester</label>
								<input disabled type="text" class="form-control" value="1st Semester" id="new_semester">
							</div>
							<div class="col-md-4 form-group">
								<label>Academic year</label>
								<?php
									$date_from = date("Y");
									$date_to = date("Y")+1;
									?>
										<input disabled type="text" value="<?php echo $date_from.'-'.$date_to;?>" class="form-control" id="new_year">
									<?php 
								?>
							</div>
							<!-- <div class="col-md-4 form-group">
								<label>To</label>
								<input disabled type="text" value="<?php echo $date_to;?>" class="form-control" id="new_yearto"> 
							</div> -->
						</div>
						<hr>
					</form>
					<!-- end of form 1 -->
					<!-- form 2 -->
					<form class="old_student" style="display: none;">
						<h1>Old Student</h1>
						<label>Last Semester</label>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Course</label>
								<select class="form-control" id="old_course">
									<option selected disabled>Select</option>
									<?php $key ?>
									<?php foreach ($courses as $key => $value): ?>
										<option value="<?php echo $value->course_name; ?>"><?php echo $value->course_name; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Academic Level</label>
								<select class="form-control" id="old_acad_level">
									<option selected disabled>Select</option>
									<option>Grade 11</option>
									<option>Grade 12</option>
								</select>
							</div>
							<div class="col-md-4 form-group">
								<label>Semester</label>
								<select class="form-control" id="old_semester">
									<option selected disabled>Select</option>
									<option>1st Semester</option>
									<option>2nd Semester</option>
								</select>
							</div>
							<div class="col-md-4 form-group">
								<label>Academic year</label>
								<select class="form-control" id="old_year">
									<option selected disabled>Select</option>
									<?php
										for($year =date("Y"); $year >=2000; $year--){
											?> 
												<option value="<?php echo $year.' - '.($year+1) ?>"><?php echo $year.' - '.($year+1) ?></option>
											<?php
										}
									?>
								</select>
							</div>
							<!-- <div class="col-md-4 form-group">
								<label>To</label>
								<select class="form-control" id="old_to">
									<option selected disabled>Select</option>
									<?php
										for($year =date("Y")+1; $year >=1950; $year--){
											?> 
												<option value="<?php echo $year ?>"><?php echo $year ?></option>
											<?php
										}
									?>
								</select>
							</div> -->
						</div>
						<hr>
					</form>
					<!-- end of form 2 -->
					<!-- form 3 -->
					<form class="transferee_student" style="display: none;">
						<h1>Transferee Student</h1>
						<label>Last Semester</label>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Course</label>
								<select class="form-control" id="transfer_course">
									<option selected disabled>Select</option>
									<?php $key ?>
									<?php foreach ($courses as $key => $value): ?>
										<option value="<?php echo $value->course_name; ?>"><?php echo $value->course_name; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Academic Level</label>
								<select class="form-control" id="transfer_acad_level">
									<option selected disabled>Select</option>
									<option>Grade 11</option>
									<option>Grade 12</option>
								</select>
							</div>
							<div class="col-md-4 form-group">
								<label>Semester</label>
								<select class="form-control" id="transfer_semester">
									<option selected disabled>Select</option>
									<option>1st Semester</option>
									<option>2nd Semester</option>
								</select>
							</div>
							<div class="col-md-4 form-group">
								<label>Academic year</label>
								<select class="form-control" id="transfer_year">
									<option selected disabled>Select</option>
									<?php
										for($year =date("Y"); $year >=2000; $year--){
											?> 
												<option value="<?php echo $year.' - '.($year+1) ?>"><?php echo $year.' - '.($year+1) ?></option>
											<?php
										}
									?>
								</select>
							</div>
							<!-- <div class="col-md-4 form-group">
								<label>To</label>
								<select class="form-control" id="transfer_to">
									<option selected disabled>Select</option>
									<?php
										for($year =date("Y")+1; $year >=1950; $year--){
											?> 
												<option value="<?php echo $year ?>"><?php echo $year ?></option>
											<?php
										}
									?>
								</select>
							</div> -->
						</div>
						<hr>
					</form>
					<!-- end of form 3 -->
				</div>
				<!-- registration form -->
				<div class="col-sm-12 pr-md-5 registration_form" style="display: none;">
					<!-- form 4 -->
					<form class="personal_info">
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
					<!-- end of form 4 -->
					<!-- form 5 -->
					<form class="student_address">
						<div class="row">
	 						<h1>Learner's Address</h1>
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
					<!-- end of form 5 -->
					<!-- form 6 -->
					<form class="educational_background">
						<div class="row">
							<h1>Educational Background</h1>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<input type="checkbox" id="oldcurriculum-transferee">Old curriculum
							</div>
						</div>
						<label>High School</label>
						<div class="old_curriculum">
							<div class="row">
								<div class="col-md-4 form-group">
									<label>School Name</label>
									<input disabled type="text" placeholder="School Name" class="form-control" id="old_school">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>House #/Street/Blk/Lot/Subdivision/Brgy</label>
									<input disabled type="text" placeholder="House #/Street/Blk/Lot/Subdivision/Brgy" class="form-control" id="old_brgy">
								</div>
								<div class="col-md-4 form-group">
									<label>Municipality</label>
									<input disabled type="text" placeholder="Municipality" class="form-control" id="old_municipality">
								</div>
								<div class="col-md-4 form-group">
									<label>Province</label>
									<input disabled type="text" placeholder="Province" class="form-control" id="old_province">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Academic year from:</label>
									<select disabled class="form-control" id="old_yearfrom">
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
									<label>to:</label>
									<select disabled class="form-control" id="old_yearto">
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
								<div class="col-md-4 form-group">
									<label>Average</label>
									<input disabled type="text" class="form-control" id="old_average">
								</div>
							</div>
						</div>
						<br>
						<label>Junior High School</label>
						<div class="junior_high" id="jshs">
							<div class="row">
								<div class="col-md-4 form-group">
									<label>School Name</label>
									<input type="text" placeholder="School Name" class="form-control" id="jshs_school">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>House #/Street/Blk/Lot/Subdivision/Brgy</label>
									<input type="text" placeholder="House #/Street/Blk/Lot/Subdivision/Brgy" class="form-control" id="jshs_brgy">
								</div>
								<div class="col-md-4 form-group">
									<label>Municipality</label>
									<input type="text" placeholder="Municipality" class="form-control" id="jshs_municipality">
								</div>
								<div class="col-md-4 form-group">
									<label>Province</label>
									<input type="text" placeholder="Province" class="form-control" id="jshs_province">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Academic year from:</label>
									<select class="form-control" id="jshs_yearfrom">
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
									<label>to:</label>
									<select  class="form-control" id="jshs_yearto">
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
								<div class="col-md-4 form-group">
									<label>Average</label>
									<input type="text" class="form-control" id="jshs_average">
								</div>
							</div>
						</div>
					</form>
					<!-- end of form 6 -->
					<div class="form-group">
						<button class="btn btn-primary sendBtn1 btn-lg">Send</button>
					</div>
				</div>
				<!-- end of registration form -->
				
			</div>
		</div>
	</section>
	<!-- end of section 2 -->
	<script type="text/javascript">
		$('#bday').datepicker();
	</script>