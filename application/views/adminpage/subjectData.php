<!--  -->
	<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/table.css">

	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row bg-title">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h4 class="page-title">Manage Subject</h4>
				</div>
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Manage</a></li>
                        <li class="active">Manage Subject</li>
                    </ol>
                </div>
			</div>

			<div class="white-box" >
				<div class="row form-material">
					<div class="col-md-5 form-group forSubject">
						<div class="updatenamesofsubject"></div>
						<ul>
							<li>
								<label>Subject Code</label>
								<input type="text" class="form-control subjectCode" value="<?php echo $subject['subject_code'] ?>">
								<input type="hidden" class="originalSubjectCode" value="<?php echo $subject['subject_code'] ?>">
							</li>
							<li>
								<p style="visibility: hidden;">as</p>
							</li>
							<li>
								<label style="visibility: hidden;">asd</label>
								<br>
								<button class="btn btn-success updateSubjectCodeBtn"><i class="fa fa-check"></i></button>
							</li>
							<li>
								<p style="visibility: hidden;">asd</p>
							</li>
							<li>
								<label>Subject Description</label>
								<input type="text" class="form-control subjectDescription" value="<?php echo $subject['subject_description'] ?>">
								<input type="hidden" class="originalSubjectDescription" value="<?php echo $subject['subject_description']; ?>">
							</li>
							<li>
								<p style="visibility: hidden;">as</p>
							</li>
							<li>
								<label style="visibility: hidden;">asd</label>
								<br>
								<button class="btn btn-success updateSubjectDescriptionBtn"><i class="fa fa-check"></i></button>
							</li>
							<li>
								<p style="visibility: hidden;">asd</p>
							</li>
							<li>
								<?php 
									$type = array(
										array(
											"type" => "applied"
										),
										array(
											"type" => "core"
										),
										array(
											"type" => "specialized"
										)
									);
									
								 ?>

								<label>Subject Type</label>
								<select class="form-control subjectType">
									 <?php foreach($type as $key => $value): ?>
									 	
									 	<?php if ($subject['subject_type'] == $value['type']): ?>
									 		<option selected><?php echo $subject['subject_type'] ?></option>
									 	<?php else: ?>
									 		<option><?php echo $value['type'] ?></option>
									 	<?php endif ?>
									 <?php endforeach ?>
								</select>
								<input type="hidden" class="originalSubjectType" value="<?php echo $subject['subject_type'] ?>">
							</li>
							<li>
								<p style="visibility: hidden;">as</p>
							</li>
							<li>
								<label style="visibility: hidden;">asd</label>
								<br>
								<button class="btn btn-success updateSubjectTypeBtn"><i class="fa fa-check"></i></button>
							</li>
						</ul>
						<input type="text" class="id" value="<?php echo $subject['id'] ?>" hidden>
					</div>
					<div class="viewTeacherDiv">
						<h4><strong>List of Teacher</strong></h4>
						<br>
						<p>List of teacher/s for this subject</p>
						<select class="removeteachers" name="removeteachers[]" multiple="multiple"  style="width: 100% !important">
							<?php foreach ($availableteachers as $value): ?>
								<?php foreach($allteachers as $value2): ?>
									<?php $new = json_decode($value2->personal_info,true); ?>
										<?php foreach($new as $key => $value3): ?>
											<?php if($value2->id == $value['id']): ?>
												<option value="<?php echo $value['id'] ?>"><?php echo ucfirst($value3['fname']).' '.ucfirst($value3['mname'][0]).'. '. ucfirst($value3['lname']) ?></option>
											<?php endif ?>
										<?php endforeach ?>
									<?php endforeach ?>
							<?php endforeach ?>
								
						</select>

					</div>
					<div class="addTeacherToSubject" style="display: none;">
						<h4><strong>Add Teacher</strong></h4>
						
						<br>
						<p>Available Teacher</p>
						<select class="teachers" name="teachers[]" multiple="multiple"  style="width: 100% !important">
							<?php foreach ($teachers as $value): ?>
								<?php $new = json_decode($value->personal_info,true); ?>
								<?php foreach($new as $key => $value2): ?>
									<option  value=<?php echo $value->id ?> style="width: 100% !important"><?php echo ucfirst($value2['fname']).' '.ucfirst($value2['mname'][0]).'. '. ucfirst($value2['lname']) ?></option>
								<?php endforeach ?>
								
							<?php endforeach ?>
							
						</select>				
					</div>
					<br><br>
				</div>
				<button style="display: none; float: left;" class="btn btn-danger removeTeacherBtn">Remove Teacher</button>
				<button style="display: none; float: left;" class="btn btn-success addTeacherBtn">Add Teacher</button>
				<ul class="buttonsForSubject">
					<li></li>
					<li><button class="btn btn-danger removeOneSubject" >Remove Subject</button></li>
					<li><button class="btn btn-success addTeacher">Add Teacher</button></li>
					<li><button class="btn btn-success viewTeacher">View Teacher</button></li>
				</ul>
				<br>
			</div>


		</div>
	</div>