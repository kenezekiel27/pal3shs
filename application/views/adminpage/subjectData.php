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
						<ul>
							<li>
								<label>Subject Code</label>
								<input readonly type="text" class="form-control subjectDescription" id="courseDescription" value="<?php echo $subject['subject_code'] ?>">
							</li>
							<li>
								<p style="visibility: hidden;">asdas</p>

							</li>
							<li>
								<label>Subject Description</label>
								<input readonly type="text" class="form-control subjectDescription" id="courseDescription" value="<?php echo $subject['subject_description'] ?>">

							</li>
							<li style="float: right;">
								<button class="btn btn-success viewTeacher">View Teacher</button>
								<button class="btn btn-success addTeacher">Add Teacher</button>
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
						<div class="addteachertosubjectwarning"></div>
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
				<button style="display: none" class="btn btn-success removeTeacherBtn">Remove Teacher</button>
				<button style="display: none;" class="btn btn-success addTeacherBtn">Add Teacher</button>
				<button class="btn btn-danger removeOneSubject" style="float: right;" >Remove Subject</button><br>
			</div>


		</div>
	</div>