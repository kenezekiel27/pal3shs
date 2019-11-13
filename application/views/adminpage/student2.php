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
					<h4 class="page-title">Student Information</h4>
				</div>
			</div>
			<!-- section 1 -->
			<div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<button class="btn btn-success personal_btn">Personal Information</button>
						<button class="btn btn-success address_btn">Address</button>
						<button class="btn btn-success guardian_btn">Guardian Information</button>
						<button class="btn btn-success educational_btn">Educational Background</button>
						<hr>
						<div class="form-material" id="Academic_info1"style="display: block;">
							<p class="personal_warning" style="display: none;"></p>
							<!-- <label>Current</label> -->
							<?php $key ?>
								<?php
									$id="";
									$course="";
									$acad_level="";
									$semester="";
									$acad_year="";
									$reg_type="";
									$new = json_decode($student_info['acad_level'],true);
									foreach ($new as $key => $value1) {
										$id=$student_info['id'];
										$course=$value1['course'];
										$acad_level=$value1['acad_level'];
										$semester=$value1['semester'];
										$acad_year=$value1['acad_year'];
										$reg_type=$value1['acad_status'];
									}
									
							 	?> 
							<div class="row">
								<div class="col-md-4 form-group">
									<input type="text" value="<?php echo $reg_type?>" hidden id="update_acad_status">
									<label>Course</label>
									<!-- <input type="text" class="form-control" value="<?php echo $course?>"> -->
									<select class="form-control" id="update_course">
										<option selected value="<?php echo $course?>"><?php echo $course?></option>
										<?php $key ?>
										<?php foreach ($courses as $key => $value): ?>
											<option value="<?php echo $value->course_name; ?>"><?php echo $value->course_name; ?></option>
										<?php endforeach ?>
									</select>

								</div>
								<!-- <div class="col-md-4 form-group">
									<label>Academic status</label>
									<input type="text" class="form-control" value="<?php echo $reg_type?>">
								</div> -->
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Academic Level</label>
									<!-- <input type="text" class="form-control" value="<?php echo $acad_level ?>"> -->
									<select class="form-control" id="update_acad_level">
										<option selected value="<?php echo $acad_level ?>"><?php echo $acad_level ?></option>
										<option>Grade 11</option>
										<option>Grade 12</option>
									</select>
									
								</div>
								<div class="col-md-4 form-group">
									<label>Semester</label>
									<!-- <input type="text" class="form-control" value="<?php echo $semester ?>"> -->
									<select class="form-control" id="update_acad_sem">
										<option selected value="<?php echo $semester ?>"><?php echo $semester ?></option>
										<option>1st Semester</option>
										<option>2nd Semester</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Academic year</label>
									<!-- <input type="text" class="form-control" value="<?php echo $acad_year ?>"> -->
									<select class="form-control" id="update_academic_year">
										<option selected value="<?php echo $acad_year ?>"><?php echo $acad_year ?></option>
										<?php foreach($academicYear as $value): ?>
											<option value="<?php echo $value->id ?>"><?php echo $value->acad_year ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<hr>
						</div>
						<!-- <div class="form-material" id="Academic_info2" style="display: none;">
							<label>Enroll to:</label>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Course</label>
									<select class="form-control" id="academic_course">
										<option selected disabled>Select</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Academic Level</label>
									<select class="form-control" id="acad_level">
										<option selected disabled>Select</option>
										<option>Grade 11</option>
										<option>Grade 12</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Semester</label>
									<select class="form-control" id="acad_sem">
										<option selected disabled>Select</option>
										<option>1st Semester</option>
										<option>2nd Semester</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Academic year</label>
									<select class="form-control" id="academic_year">
										<option selected disabled>Select</option>
										<?php foreach($academicYear as $value): ?>
											<option value="<?php echo $value->id ?>"><?php echo $value->acad_year ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div> -->
						<!-- div for personal info -->
						<div class="form-material" id="personal_information" style="display: block;">
							<?php $key ?>
								<?php 
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
									$new = json_decode($student_info['personal_info'],true);
									foreach ($new as $key => $value2) {
										$lrn=$student_info['lrn'];
										$lname=$value2['lname'];
										$fname=$value2['fname'];
										$mname=$value2['mname'];
										$sex=$value2['sex'];
										$bday=$value2['bday'];
										$bplace=$value2['bplace'];
										$age=$value2['age'];
										$height=$value2['height'];
										$weight=$value2['weight'];
										$language=$value2['language'];
										$religion=$value2['religion'];
										$egroup=$value2['ethnic_group'];
										$telephone=$value2['telephone'];
										$mobile=$value2['mobile'];
										$email=$value2['email'];
									}
									
							 	?> 	
							<h1>Personal Information</h1>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>LRN</label>
									<input readonly type="text" class="form-control" value="<?php echo $lrn?>" id="update_lrn">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Last Name</label>
									<input type="text" class="form-control"  value="<?php echo ucwords($lname);?>" id="update_lname">
								</div>
								<div class="col-md-4 form-group">
									<label>First Name</label>
									<input type="text" class="form-control"  value="<?php echo ucwords($fname);?>" id="update_fname">
								</div>
								<div class="col-md-4 form-group">
									<label>Middle Name</label>
									<input type="text" class="form-control"  value="<?php echo ucwords($mname);?>" id="update_mname">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Sex</label>
									<select class="form-control" id="update_sex">
										<option selected value="<?php echo ucfirst($sex);?>"><?php echo ucfirst($sex);?> </option>
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
									<input type="text" class="form-control"value="<?php echo ucwords($bplace)?>" id="update_bplace">
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
		 								<option selected value="<?php echo ucfirst($religion)?>"><?php echo ucfirst($religion)?></option>
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
		 					<button class="btn btn-success update_personal_info" id="<?php echo $id ?>">Update</button>
						</div>
						<!-- end of personal info -->
						<!-- Address -->
						<div class="form-material" id="address" style="display: none;">
							<?php $key ?>
								<?php 
									$brgy="";
									$municipality="";
									$province="";
									$new = json_decode($student_info['address'],true);
									foreach ($new as $key => $value3) {
										
										$brgy=$value3['brgy'];
										$municipality=$value3['municipality'];
										$province=$value3['province'];
									}
									
							 	?> 
							<h1>Learner's Address</h1>
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
							<button class="btn btn-success update_address_info" id="<?php echo $id ?>">Update</button>
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
									$new = json_decode($student_info['guardian_info'],true);
									foreach ($new as $key => $value4) {
										$g_lname=$value4['g_lname'];
										$g_fname=$value4['g_fname'];
										$g_mname=$value4['g_mname'];
										$g_relation=$value4['g_relationship'];
										$g_contact=$value4['g_contact'];
										$g_brgy=$value4['g_brgy'];
										$g_municipality=$value4['g_municipality'];
										$g_province=$value4['g_province'];
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
									<label>First Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($g_fname)?>" id="update_g_fname">
								</div>
								<div class="col-md-4 form-group">
									<label>Middle Name</label>
									<input type="text" class="form-control"   value="<?php echo ucwords($g_mname)?>" id="update_g_mname">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Relationship</label>
									<input type="text" class="form-control" value="<?php echo ucfirst($g_relation)?>" id="update_g_relation">
								</div>
								<div class="col-md-4 form-group">
									<label>Contact Number</label>
									<input type="text" class="form-control"value="<?php echo $g_contact?>" id="update_g_contact"> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
		 							<label>House#/Street/Blk/Lot/Subdivision/Brgy</label>
		 							<input type="text" class="form-control"value="<?php echo ucwords($g_brgy)?>" id="update_g_brgy"> 
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
							<button class="btn btn-success update_guardian_info" id="<?php echo $id ?>">Update</button>		
						</div>
						<!-- end of guardian information -->
						<!-- educational background -->
						<div class="form-material" id="educational_background" style="display: none;">
							<?php $key ?>
								<?php 
									$curriculum="";
									$school="";
									$s_brgy="";
									$s_municipality="";
									$s_province="";
									$s_yearfrom="";
									$s_yearto="";
									$s_average="";

									$new = json_decode($student_info['education'],true);
									foreach ($new as $key => $value5) {
										$curriculum=$value5['curriculum'];
										$school=$value5['school'];
										$s_brgy=$value5['brgy'];
										$s_municipality=$value5['municipality'];
										$s_province=$value5['province'];
										$s_yearfrom=$value5['yearfrom'];
										$s_yearto=$value5['yearto'];
										$s_average=$value5['average'];
									}
									
							 	?> 
							<h1 value="<?php echo ucwords($curriculum)?>"><?php echo ucwords($curriculum)?></h1>
							<input value="<?php echo ucwords($curriculum)?>" id="update_curriculum" hidden>
							<p class="education_warning" style="display: none;"></p>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>School name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($school)?>" id="update_school">
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
										<option selected value="<?php echo $s_yearfrom?>" ><?php echo $s_yearfrom?></option>
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
										<option selected value="<?php echo $s_yearto?>" ><?php echo $s_yearto?></option>
										<?php 
											for($year =date("Y")+1; $year >=2000; $year--){
												?> 
													<option value="<?php echo $year ?>"><?php echo $year ?></option>
												<?php
											}
										?>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Average</label>
									<input type="text" class="form-control" value="<?php echo $s_average?>" id="update_saverage">
								</div>
							</div>
							<button class="btn btn-success update_education_info" id="<?php echo $id ?>">Update</button>	
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