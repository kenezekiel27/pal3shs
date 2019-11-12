<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/table.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/adminpage.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
	<!-- page content -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row bg-title">
				<div div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h4 class="page-title">Teacher Information</h4>
				</div>
			</div>
			<!-- section 1 -->
			<div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<button class="btn btn-success" id="personalbtn">Personal Information</button>
						<button class="btn btn-success" id="addressbtn">Address</button>
						<button class="btn btn-success" id="guardianbtn">Guardian Information</button>
						<button class="btn btn-success" id="educationalbtn">Educational Background</button>
						<hr>
						<!-- div for personal info -->
						<div class="form-material" id="personal_information" style="display: block;">
							<?php $key ?>
								<?php 
									$id="";
									$lrn="";
									$lname="";
									$fname="";
									$mname="";
									$sex="";
									$bday="";
									$bplace="";
									$age="";
									$height="";
									$weight="";
									$language="";
									$religion="";
									$egroup="";
									$telephone="";
									$mobile="";
									$email="";
									$new = json_decode($teacher_info['personal_info'],true);
									foreach ($new as $key => $value1) {
										$id=$teacher_info['id'];
										$lrn=$teacher_info['lrn'];
										$lname=$value1['lname'];
										$fname=$value1['fname'];
										$mname=$value1['mname'];
										$sex=$value1['sex'];
										$bday=$value1['bday'];
										$bplace=$value1['bplace'];
										$age=$value1['age'];
										$height=$value1['height'];
										$weight=$value1['weight'];
										$language=$value1['language'];
										$religion=$value1['religion'];
										$egroup=$value1['ethnic_group'];
										$telephone=$value1['telephone'];
										$mobile=$value1['mobile'];
										$email=$value1['email'];
										
									}
									
							 	?> 
							<h1>Personal Information</h1>
							<p class="personal_warning" style="display: none;"></p>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>LRN</label>
									<input readonly type="text" class="form-control" value="<?php echo $lrn?>" id="update_lrn">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($lname)?>" id="update_lname">
								</div>
								<div class="col-md-4 form-group">
									<label>First Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($fname)?>" id="update_fname">
								</div>
								<div class="col-md-4 form-group">
									<label>Middle Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($mname)?>" id="update_mname">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Sex</label>
									<select class="form-control" id="update_sex">
										<option selected value="<?php echo ucfirst($sex)?>"><?php echo ucfirst($sex)?></option>
										<option>Male</option>
										<option>Female</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Birth Date</label>
									<input type="text" class="form-control" value="<?php echo $bday?>" id="update_bday">
								</div>
								<div class="col-md-4 form-group">
									<label>Birth Place</label>
									<input type="text" class="form-control" value="<?php echo $bplace?>" id="update_bplace">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Age</label>
									<input type="text" class="form-control" value="<?php echo $age?>" id="update_age">
								</div>
								<div class="col-md-4 form-group">
									<label>Height</label>
									<input type="text" class="form-control" value="<?php echo $height?>" id="update_height">
								</div>
								<div class="col-md-4 form-group">
									<label>Weight</label>
									<input type="text" class="form-control" value="<?php echo $weight?>" id="update_weight">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
		 							<label>Language</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($language)?>" id="update_language">
		 						</div>
		 						<div class="col-md-4 form-group">
		 							<label>Religion</label>
		 							<select class="form-control" id="update_religion">
		 								<option selected value="<?php echo ucwords($religion)?>"><?php echo ucwords($religion)?></option>
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
		 							<select class="form-control" id="update_egroup">
		 								<option selected value="<?php echo ucfirst($egroup)?>"><?php echo ucfirst($egroup)?></option>
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
		 							<input type="text" class="form-control" value="<?php echo $telephone?>" id="update_telephone">
		 						</div>
		 						<div class="col-md-4 form-group">
		 							<label>Mobile Number</label>
		 							<input type="text" class="form-control" value="<?php echo $mobile?>" id="update_mobile">
		 						</div>
		 						<div class="col-md-4 form-group">
		 							<label>Email Address</label>
		 							<input type="email" class="form-control" value="<?php echo $email?>" id="update_email">
		 						</div>
		 					</div>
		 					<button class="btn btn-success update_teacher_personal_info" id="<?php echo $id ?>">Update</button>
						</div>
						<!-- end of personal info -->
						<!-- Address -->
						<div class="form-material" id="address" style="display: none;">
							<?php $key ?>
								<?php 
									$brgy="";
									$municipality="";
									$province="";
									$new = json_decode($teacher_info['address'],true);
									foreach ($new as $key => $value2) {
										
										$brgy=$value2['brgy'];
										$municipality=$value2['municipality'];
										$province=$value2['province'];
									}
									
							 	?> 
							<h1>Teacher's Address</h1>
							<p class="address_warning" style="display: none;"></p>
							<div class="row">
								<div class="col-md-4 form-group">
		 							<label>House#/Street/Blk/Lot/Subdivision/Brgy</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($brgy)?>" id="update_brgy">
		 						</div>
		 						<div class="col-md-4">
		 							<label>Municipality</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($municipality)?>" id="update_municipality">
		 						</div>
		 						<div class="col-md-4">
		 							<label>Province</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($province)?>" id="update_province">
		 						</div>
							</div>
							<button class="btn btn-success update_teacher_address" id="<?php echo $id ?>">Update</button>
						</div>
						<!-- end of Address -->
						<!-- guardian information -->
						<div class="form-material" id="guardian_info" style="display: none;">
							<?php $key ?>
								<?php 
									$g_lname="";
									$g_fname="";
									$g_mname="";
									$g_relation="";
									$g_contact="";
									$g_brgy="";
									$g_municipality="";
									$g_province="";
									$new = json_decode($teacher_info['guardian_info'],true);
									foreach ($new as $key => $value3) {
										$g_lname=$value3['g_lname'];
										$g_fname=$value3['g_fname'];
										$g_mname=$value3['g_mname'];
										$g_relation=$value3['g_relationship'];
										$g_contact=$value3['g_contact'];
										$g_brgy=$value3['g_brgy'];
										$g_municipality=$value3['g_municipality'];
										$g_province=$value3['g_province'];
									}
									
							 	?> 
							<h1>Guardian Information</h1>
							<p class="guardian_warning" style="display: none;"></p>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($g_lname)?>" id="update_g_lname">
								</div>
								<div class="col-md-4 form-group">
									<label>first Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($g_fname)?>" id="update_g_fname">
								</div>
								<div class="col-md-4 form-group">
									<label>Middle Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($g_mname)?>" id="update_g_mname">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Relationship</label>
									<input type="text" class="form-control" value="<?php echo ucfirst($g_relation)?>" id="update_g_relation">
								</div>
								<div class="col-md-4 form-group">
									<label>Contact Number</label>
									<input type="text" class="form-control" value="<?php echo $g_contact?>" id="update_g_contact">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
		 							<label>House#/Street/Blk/Lot/Subdivision/Brgy</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($g_brgy)?>" id="update_g_brgy">
		 						</div>
		 						<div class="col-md-4 form-group">
		 							<label>Municipality</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($g_municipality)?>" id="update_g_municipality">
		 						</div>
		 						<div class="col-md-4 form-group">
		 							<label>Province</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($g_province)?>" id="update_g_province">
		 						</div>
							</div>
							<button class="btn btn-success update_teacher_guardian" id="<?php echo $id ?>">Update</button>		
						</div>
						<!-- end of guardian information -->
						<!-- educational background -->
						<div class="form-material" id="educational_background" style="display: none;">
							<?php $key ?>
								<?php 
									$school="";
									$degree="";
									$course="";
									$s_brgy="";
									$s_municipality="";
									$s_province="";
									$s_yearfrom="";
									$s_yearto="";
									

									$new = json_decode($teacher_info['education'],true);
									foreach ($new as $key => $value4) {
										$school=$value4['school_name'];
										$degree=$value4['degree'];
										$course=$value4['course'];
										$s_brgy=$value4['s_brgy'];
										$s_municipality=$value4['s_municipality'];
										$s_province=$value4['s_province'];
										$s_yearfrom=$value4['year_from'];
										$s_yearto=$value4['year_to'];
					
									}
									
							 	?> 
							<h1>Educational Background</h1>
							<p class="education_warning" style="display: none;"></p>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>School name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($school)?>" id="update_school">
								</div>
								<div class="col-md-4 form-group">
									<label>Degree</label>
									<select class="form-control" id="update_degree">
										<option selected disabled value="<?php echo ucwords($degree)?>"><?php echo ucwords($degree)?></option>
										<option>Bachelor of Science</option>
										<option>Bachelor of Arts</option>
										<option>Bachelor in Secondary Education</option>
										<option>Bachelor in Elementary Education</option>
										<option>Bachelor in Secondary Education Major in</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Course</label>
									<input type="text" class="form-control" value="<?php echo ucwords($course)?>" id="update_course">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>House#/Street/Blk/Lot/Subdivision/Brgy</label>
									<input type="text" class="form-control" value="<?php echo ucwords($s_brgy)?>" id="update_sbrgy">
								</div>
								<div class="col-md-4 form-group">
									<label>Municipality</label>
									<input type="text" class="form-control" value="<?php echo ucwords($s_municipality)?>" id="update_smunicipality">
								</div>
								<div class="col-md-4 form-group">
									<label>Province</label>
									<input type="text" class="form-control" value="<?php echo ucwords($s_province)?>" id="update_sprovince">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Academic year from</label>
									<select class="form-control" id="update_syearfrom">
										<option selected disabled value="<?php echo $s_yearfrom?>" ><?php echo $s_yearfrom?></option>
										<?php 
											for($year =date("Y"); $year >=2000; $year--){
												?> 
													<option value="<?php echo $year ?>"><?php echo $year ?></option>
												<?php
											}
										?>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>to</label>
									<select class="form-control" id="update_syearto">
										<option selected disabled value="<?php echo $s_yearto?>" ><?php echo $s_yearto?></option>
										<?php 
											for($year =date("Y")+1; $year >=2000; $year--){
												?> 
													<option value="<?php echo $year ?>"><?php echo $year ?></option>
												<?php
											}
										?>
									</select>
								</div>
							</div>
							<button class="btn btn-success update_teacher_education" id="<?php echo $id ?>">Update</button>	
						</div>
						<!-- end of educational background -->
					</div>
				</div>
			</div>
			<!-- end of section 1 -->
		</div>
	</div>
	<!-- end of page content -->
	<script type="text/javascript">
		$('#update_bday').datepicker();
	</script>