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
						<button data-toggle ="modal" data-target="#add_section_form" class="btn btn-success add_sectionBtn" type="button">Add New Section</button>
						<button class="btn btn-success" data-toggle="modal" data-target="#add_acadyear_form" type="button">Add Academic Year</button>
						<button class="btn btn-success" data-toggle="modal" data-target="#" type="button">Add Section To Existing Data</button>
						<hr>
						
						<br>
						<button class="btn btn-primary">Filter data</button>
						
						<br><br>
						<h3>List of Section: All</h3>
						<table id="sectionTable" class="table table-striped table-bordered" style="width: 100%">
							<thead>
								<tr>
									<th style="text-align: center;">Academic Year</th>
									<th style="text-align: center; width: 120px">Course</th>
									<th style="text-align: center;">Status</th>
									<th style="text-align: center;">Section</th>
									<th style="text-align: center;">Grade</th>
									<td style="text-align: center; font-weight: bold; color:#666">Semester</td>
									<th style="text-align: center;">Student</th>
									<th style="text-align: center;">Adviser</th>
									<th style="text-align: center;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($section_list as $value): ?>
									<tr class="sectionrow-<?php echo $value->id ?>">
										<td style="text-align: center;"><?php echo $value->academic_year ?></td>
										<td style="text-align: center; width: 120px"><?php echo $value->course ?></td>
										<td style="text-align: center;"><?php echo $value->status ?></td>
										<td style="text-align: center;"><?php echo $value->section_name ?></td>
										<td style="text-align: center;"><?php echo $value->academic_level ?></td>
										<td style="text-align: center;"><?php echo $value->semester ?></td>
										<td style="text-align: center;">
											<?php $listofstudent = json_decode($value->student_id, TRUE) ?>
											<input type="hidden" class="noOfStudent<?php echo $value->id ?>" value="<?php echo count($listofstudent); ?>">
											<?php echo count($listofstudent); ?>
										</td>
										<td style="text-align: center;" class="adviser<?php echo $value->id ?>">
											<?php if ($value->adviser == ""): ?>
												<button class="btn btn-primary btn-sm openAdviser adviser<?php echo $value->id ?>" data-toggle="modal" data-target="#add_adviser_form" id="<?php echo $value->id;?>">Assign</button>
											<?php else: ?>
												<?php foreach($teachers as $value2): ?>
													<?php $data = json_decode($value2->personal_info , TRUE) ?>

													<?php foreach($data as $value3): ?>
														<?php if ($value->adviser == $value2->id): ?>
															<?php echo ucfirst($value3['fname']).' '.ucfirst($value3['mname'][0]).'. '. ucfirst($value3['lname']) ?>
														<?php endif ?>
													<?php endforeach ?>
												<?php endforeach ?>
												
											<?php endif ?>
										</td>
										
										<td style="text-align: center;">
											<a href="<?php echo base_url();?>section" title="View" data-toggle="tooltip" class="btn btn-success viewSectionBtn<?php echo $value->id ?> btn-sm"><i class="fa fa-eye"></i></a>
											<button  title="Remove" data-toggle="tooltip" class="btn btn-danger btn-sm removeSectionBtn removesection<?php echo $value->id  ?>" id="<?php echo $value->id;?>" ><i id="<?php echo $value->id;?>" class="fa fa-times" ></i></button>
										</td>
									</tr>
								<?php endforeach ?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="modal" id="add_adviser_form">
				<div class="container add_adviser" id="add_adviser_form_body">
					<br><br>
					<center><p style="font-size: 20px; font-weight: lighter;">Add Adviser</p></center>
					<span class="close close_form" data-dismiss="modal">&times;</span>
					<hr>
					<p class="add_section_warning" style="font-weight: lighter"></p>
					<div class="modal_body form" style="width: 100% !important; left: 0px !important;">
						<div class="hideifnoteacheravailable" >
							<p class="addadvisertosectionwarning" style="font-weight: lighter;"></p>
							<br>
							<p style="font-weight: lighter;">Available teacher</p>
							<select class="form-control selectAdviser" >
								<option selected disabled>Select</option>
								
							</select>
							<br>

							<center><button class="btn btn-success addAdviserBtn" style="width: 30%">Add</button></center>
						</div>
						<div class="showifnoteacheravailable" style="display: none;">
							<center><p style="font-weight: lighter;">No available teacher.</p></center>
						</div>
					</div>
					<br><br>
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
								<label>Academic Year</label>
								<select class="form-control" id="sec_acadyear">
									<option selected disabled>Select</option>
									<?php foreach($academicYear as $value): ?>
										<option value="<?php echo $value->id ?>"><?php echo $value->acad_year ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-md-4">
								<label>Status</label>
								<select class="form-control" id="sec_status">
									<option selected disabled>Select</option>
									<option>Current</option>
									<option>Previous</option>
								</select>
							</div>
							<div class="col-md-4">
								<label>Course</label>
								<select class="form-control " id="sec_acad_course">
									<option selected disabled>Select</option>
									<option disabled>Select a academic year to show the courses</option>>
								</select>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-4">
								<label>No of section</label>
								<input type="number"  class="form-control noOfSection" value="1" min="1" max="20">
							</div>
							
							<div class="col-md-4">
								<label>Academic Level</label>
								<select class="form-control" id="sec_grade">
									<option selected disabled>Select</option>
									<option disabled>Select a course and status to show the levels</option>
								</select>
							</div>	
							<div class="col-md-4">
								<label>Semester</label>
								<select class="form-control" id="sec_semester">
									<option disabled selected>Select</option>
									<option disabled>Select a level to show the semester</option>
								</select>
							</div>
							
						</div>
						<br>
						
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
					<p class="add_acadyear_warning" style="font-weight: lighter"></p>
					<div class="modal_body form-material" style="width: 100% !important; left: 0px !important;">
						<div class="row">
							<div class="col-md-12">
								<label>Academic Year</label>
								<select class="form-control selectAcadYear">
									<option selected disabled>Select</option>
									<?php 
										for ($year = date("Y"); $year >= 1995; $year--) { 
											?>
												<option value="<?php echo $year; ?>-<?php echo $year+1; ?>"><?php echo $year; ?>-<?php echo $year+1; ?></option>
											<?php
										}
									 ?>
								</select>
							</div>
							
						</div><br>
						<div class="row">
							<div class="col-md-12">
								<label>Open Course</label>
								<br>
								<select class="openCourse" style="width: 100% !important;" multiple="multiple" >
									<?php foreach ($courses as $key => $value): ?>
										<option value="<?php echo $value->id ?>"><?php echo $value->course_name ?></option>
									<?php endforeach ?>
									
								</select>
							</div>
						</div>
					</div>
					<br><br><br>
					<center><button class="btn btn-success add_acad_year_btn" style="width: 25%; display: none;">Add</button></center>
					<br><br>
				</div>

			</div>

		</div>
	</div>