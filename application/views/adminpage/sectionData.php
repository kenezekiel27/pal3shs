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
						<label>Academic Year</label>
						<input readonly type="text" class="form-control" value="<?php echo $sectiondata['academic_year'] ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Course</label>
						<input readonly type="text" class="form-control" value="<?php echo $sectiondata['course'] ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Year Level</label>
						<input readonly type="text" class="form-control" value="<?php echo $sectiondata['academic_level'] ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Semester</label>
						<input readonly type="text" class="form-control" value="<?php echo $sectiondata['semester'] ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Status</label>
						<input readonly type="text" class="form-control" value="<?php echo $sectiondata['status'] ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Section</label>
						<input readonly type="text" class="form-control" value="<?php echo $sectiondata['section_name'] ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Adviser</label>
						<input readonly type="text" class="form-control" value="<?php echo $fullname ?>">
					</div>
				</div>

				<button class="btn btn-success" data-toggle="modal" data-target="#add_studenttosection_form">Add student</button>
				<br>
				<h3>List of Student</h3>
				<br>

				<?php foreach($student as $value): ?>
					<?php echo $value['id'] ?>
					<br>
				<?php endforeach ?>
			</div>
			<div class="modal" id="add_studenttosection_form">
				<div class="container add_studenttosection" id="add_studenttosection_form_body">
					<br><br>
					<center><p style="font-size: 20px; font-weight: lighter;">Add Student</p></center>
					<span class="close close_form" data-dismiss="modal">&times;</span>
					<hr>
					<p class="add_section_warning" style="font-weight: lighter"></p>
					<br>
					<p style="font-weight: lighter;">Available Student</p>
					<select class="form-control availablestudent" multiple="multiple" style="width: 100%;">
						<option>asd</option>
						<option>asd</option>
					</select>
					<br><br>
					<center><button class="btn btn-primary" style="width: 30%">Add</button></center>
					<br><br>
				</div>
			</div>


		</div>
	</div>