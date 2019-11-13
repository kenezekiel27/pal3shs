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

			<div class="white-box" >
				<div class="row form-material">
					<div class="col-md-4 form-group">
						<input type="hidden" class="idofsecion" value="<?php echo $sectiondata['id'] ?>">
						<label>Academic Year</label>
						<input readonly type="text" class="form-control academicYear" value="<?php echo $sectiondata['academic_year'] ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Course</label>
						<input readonly type="text" class="form-control course" value="<?php echo $sectiondata['course'] ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Year Level</label>
						<input readonly type="text" class="form-control academicLevel" value="<?php echo $sectiondata['academic_level'] ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Semester</label>
						<input readonly type="text" class="form-control semester" value="<?php echo $sectiondata['semester'] ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Status</label>
						<input readonly type="text" class="form-control status" value="<?php echo $sectiondata['status'] ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Section</label>
						<input readonly type="text" class="form-control sectionName" value="<?php echo $sectiondata['section_name'] ?>">
					</div>
					<div class="nameofadviserhere">
						
						<?php if ($fullname == ""): ?>
							<div class="col-md-4 form-group">
								<button class="btn btn-primary btn-sm assignAdviser" data-toggle="modal" data-target="#add_adviser_form">Assign Adviser</button>
							</div>
						<?php else: ?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Adviser</label>
							<ul>
								<li><input readonly type="text" class="form-control" value="<?php echo $fullname ?>"></li>
								<li>
									<span title="Edit" data-toggle="tooltip">
										<button data-toggle="modal" data-target="#add_adviser_form" class="btn btn-success btn-sm openUpdateAdviser"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
									</span>
									
								</li>
							</ul>
						<?php endif ?>
					</div>
				</div>
				<hr>
				<button class="btn btn-success openAddStudentBtn" data-toggle="modal" data-target="#add_studenttosection_form">Add student</button>
				<br>
				<h3>List of Student</h3>
				<br>
				<table id="sectionTable" class="table table-striped table-bordered" style="width: 100%">
					<thead>
						<tr>
							<th style="text-align: center;">LRN</th>
							<th style="text-align: center;">Name</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($studentinsection as $value): ?>
							<tr class="studentinsectionrow-<?php echo $value['id']  ?>">
								<th style="font-weight: lighter; text-align: center;"><?php echo $value['lrn'] ?></th>
								<th style="font-weight: lighter; text-align: center;"><?php echo $value['name'] ?></th>
								<th style="font-weight: lighter; text-align: center;">
									<a href="<?php echo base_url();?>student2/<?php echo $value['id'] ?>" title="View" data-toggle="tooltip" class="btn btn-success idofviewbtn<?php echo $value['id'] ?>  btn-sm"><i class="fa fa-eye"></i></a>
									<button  title="Remove" data-toggle="tooltip" class="btn btn-danger btn-sm removeStudentinSection idofremovebtn<?php echo $value['id'] ?>" id="<?php echo $value['id'];?>" ><i id="<?php echo $value['id'];?>" class="fa fa-times" ></i></button>
								</th>
							</tr>
						<?php endforeach ?>
						
					</tbody>
				</table>
				<?php $noofstudent = json_decode($sectiondata['student_id'], TRUE) ?>
				<input type="hidden" class="noofstudent" value="<?php echo count($noofstudent);  ?>">
				<br>
				<h3>List of Subject</h3>
				<br>
				<table id="subjectTable" class="table table-striped table-bordered" style="width: 100%">
					<thead>
						<tr>
							<th style="text-align: center;">Subject Code</th>
							<th style="text-align: center;">Subject Description</th>
							<th style="text-align: center;">Teacher</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($subject as $value): ?>
							<tr>
								<?php $status = false;?>
								<td style="text-align: center; font-weight: lighter;"><?php echo $value['subjectcode'] ?></td>
								<td style="text-align: center; font-weight: lighter;"><?php echo $value['subjectdescription'] ?></td>
								<td style="text-align: center; font-weight: lighter;" class="teacherHere<?php echo $value['id'] ?>">
									<?php if ( $value['name'] == 'non'): ?>
										<button class="btn btn-primary assignTeacherToSubject" id="<?php echo $value['id'] ?>" data-toggle="modal" data-target="#add_teachertosubject_form">Assign</button>
									<?php else: ?>
										<?php echo $value['name'] ?>
										<input type="hidden" class="idofteacherToRemove<?php echo $value['id'] ?>" value="<?php echo $value['idofteacher'] ?>">
									<?php endif ?>
								</td>
								<td style="text-align: center; font-weight: lighter;" class="buttonshere<?php echo $value['id'] ?>">
									<a href="<?php echo base_url();?>subject/<?php echo $value['id']?>" title="Edit" data-toggle="tooltip"  class="btn btn-success btn-sm "><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></a>
									<?php if ( $value['name'] != 'non'): ?>
										<button class="btn btn-danger btn-sm removeTeacherinSubject removeid<?php echo $value['id'];?>" id="<?php echo $value['id'];?>" data-toggle="tooltip" data-title="Remove Teacher"><i id="<?php echo $value['id'];?>" class="fa fa-trash" ></i></button>
									<?php endif ?>
								</td>
							</tr>
						<?php endforeach ?>
						
					</tbody>
				</table>
				<button class="btn btn-danger removeOneSection" id="<?php echo $sectiondata['id'] ?>" style="float: right;">Remove Section</button>
				<br>

			</div>
			<div class="modal" id="add_studenttosection_form">
				<div class="container add_studenttosection" id="add_studenttosection_form_body">
					<br><br>
					<center><p style="font-size: 20px; font-weight: lighter;">Add Student</p></center>
					<span class="close close_form" data-dismiss="modal">&times;</span>
					<hr>
					<p class="add_tosection_warning" style="font-weight: lighter"></p>
					<br>
					
					<div class="hidewhennostudent">
						<p style="font-weight: lighter;">Available Student</p>
						<select class="form-control availablestudent" multiple="multiple" style="width: 100%;">
							<!-- <?php foreach($student as $value): ?>
								<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
							<?php endforeach ?> -->
						</select>
					</div>
					<div class="showwhennostudent" style="display: none;">
						<center><p style="font-weight: lighter;">No available student</p></center>
					</div>
					
					
					<br><br>
					<center><button class="btn btn-primary addStudentToSectionBtn" id="<?php echo $sectiondata['id'] ?>" style="width: 30%; display: none">Add</button></center>
					<br><br>
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
							<p class="addadvisertosectionwarningonesection" style="font-weight: lighter;"></p>
							<br>
							<p style="font-weight: lighter;">Available teacher</p>
							<select class="form-control selectAdviserinOneSection" >
								<option selected disabled>Select</option>
								
							</select>
							<br>

							<center><button class="btn btn-success addAdviserBtnToSection" style="width: 30%">Add</button></center>
						</div>
						<div class="showifnoteacheravailable" style="display: none;">
							<center><p style="font-weight: lighter;">No available teacher.</p></center>
						</div>
					</div>
					<br><br>
				</div>
			</div>
			<div class="modal" id="add_teachertosubject_form">
				<div class="container teachertosubject" id="add_teachertosubject_form_body">
					<br><br>
					<center><p style="font-size: 20px; font-weight: lighter;">Add Teacher</p></center>
					<span class="close close_form" data-dismiss="modal">&times;</span>
					<hr>
					<p class="add_teachertosubject_warning" style="font-weight: lighter"></p>
					<div class="modal_body form" style="width: 100% !important; left: 0px !important;">
						<div class="hideifnoteacheravailable" >
							<p class="addadvisertosectionwarningonesection" style="font-weight: lighter;"></p>
							<br>
							<p style="font-weight: lighter;">Available teacher</p>
							<select class="form-control selectTeacherToSubject" >
								<option selected disabled>Select</option>
								
							</select>
							<br>

							<center><button class="btn btn-success addTeacherBtnToSubject" style="width: 30%">Add</button></center>
						</div>
						<div class="showifnoteacheravailable" style="display: none;">
							<center><p style="font-weight: lighter;">No available teacher.</p></center>
						</div>
					</div>
					<br><br>
				</div>
			</div>
		</div>
	</div>