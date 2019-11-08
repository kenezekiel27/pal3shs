<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/table.css">
	<!-- page content -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row bg-title">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h4 class="page-title">Manage Section</h4>
				</div>
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Manage</a></li>
                        <li class="active">Manage Section</li>
                    </ol>
                </div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<button data-toggle ="modal" data-target="#add_section_form" class="btn btn-success add_sectionBtn" type="button">Add Section</button>
						<button class="btn btn-success" data-toggle="modal" data-target="#add_acadyear_form" type="button">Add Academic Year</button>
						<hr>
						<h3>List of Section</h3>
						<br>
					</div>
				</div>
			</div>

			<div class="modal" id="add_section_form">
				<div class="container add_section" id="add_section_form_body">
					<br><br>
					<center><p style="font-size: 20px; font-weight: lighter;">Add Section</p></center>
					<span class="close close_form" data-dismiss="modal">&times;</span>
					<hr>
					<p class="add_section_warning" style="font-weight: lighter"></p>
					<div class="modal_body form-material" style="width: 100% !important; left: 0px !important;">
						<div class="row">
							<div class="col-md-4">
								<label>Course</label>
								<select class="form-control d" id="sec_acad_course">
									<option selected disabled>Select</option>
									<?php foreach ($courses as $key => $value): ?>
										<option class="form-control"><?php echo $value->course_name ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-md-4">
								<label>Academic Level</label>
								<select class="form-control" id="sec_acad_level">
									<option selected disabled>Select</option>
									<option>Grade 11</option>
									<option>Grade 12</option>
								</select>
							</div>	
							<div class="col-md-4">
								<label>Semester</label>
								<select class="form-control" id="sec_semester">
									<option disabled selected>Select</option>
									<option>1st Semester</option>
									<option>2nd Semester</option>
								</select>
							</div>
							
						</div>
						<br>
						<div class="row"> 
							<div class="col-md-4">
								<label>Year From</label>
								<select class="form-control" id="sec_acad_yearfrom">
									<option selected disabled>Select</option>
									<?php
										for($year = date("Y"); $year >= 1995; $year--){
								            ?>
								                <option value="<?php echo $year ?>"><?php echo $year ?></option>
								            <?php
								        }
								     ?> 
									?>
								</select>
							</div>
							<div class="col-md-4">
								<label>Year To</label>
								<select class="form-control" id="sec_acad_yearto">
									<option selected disabled>Select</option>
									<?php
										for($year = date("Y")+1; $year >= 1995; $year--){
								            ?>
								                <option value="<?php echo $year ?>"><?php echo $year ?></option>
								            <?php
								        }
								     ?> 
									?>
								</select>
							</div>
							<div class="col-md-4">
								<label>Adviser</label>
								<select class="form-control" id="sec_adviser">
									<option selected disabled>Select</option>
									<?php foreach ($teachers as $key => $value): ?>
										<?php $info = json_decode($value->personal_info, TRUE) ?>
										<?php foreach($info as $value2): ?>
											<option value="<?php echo $value->id ?>"><?php echo ucfirst($value2['fname']).' '.ucfirst($value2['mname'][0]).'. '. ucfirst($value2['lname']) ?></option>
										<?php endforeach ?>
										
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-4">
								<label>Status</label>
								<select class="form-control">
									<option selected disabled>Select</option>
									<option>Current</option>
									<option>Previous</option>
								</select>
							</div>
							<div class="col-md-4">
								<label>No of section</label>
								<input type="number"  class="form-control noOfSection" value="1" min="1" max="20">
							</div>
							
						</div>

						<br><br><br>
						<center><button class="btn btn-success add_new_section" type="button" style="width: 40%;">Add</button></center>
						<br><br><br>
					</div>
					
				</div>
			</div>
			<div class="modal" id="add_acadyear_form">
				<div class="container add_acadyear" id="add_acadyear_form_body">
					<br><br>
					<center><p style="font-size: 20px; font-weight: lighter;">Add Academic Year</p></center>
					<span class="close close_form" data-dismiss="modal">&times;</span>
					<hr>
					<p class="add_section_warning" style="font-weight: lighter"></p>
					<div class="modal_body form-material" style="width: 100% !important; left: 0px !important;">
						<div class="row">
							<div class="col-md-6">
								<label>Academic Year</label>
								<select class="form-control">
									<option selected disabled>Select</option>
									<?php 
										for ($year = date("Y"); $year >= 1995; $year--) { 
											?>
												<option><?php echo $year; ?> / <?php echo $year+1; ?></option>
											<?php
										}
									 ?>
								</select>
							</div>
							<div class="col-md-6">
								<label>Open Course</label>
								<br>
								<select class="openCourse" style="width: 100% !important" multiple="multiple" >
									<?php foreach ($courses as $key => $value): ?>
										<option class="form-control"><?php echo $value->course_name ?></option>
									<?php endforeach ?>
									
								</select>
							</div>
						</div>
						
					</div>
					<br><br><br>
					<center><button class="btn btn-success" style="width: 25%">Add</button></center>
					<br><br>
				</div>

			</div>

		</div>
	</div>