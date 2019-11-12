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
					<h4 class="page-title">My Students</h4>
				</div>
			</div>
			<div class="white-box" >
				<div class="row form-material">
					<div class="col-md-4 form-group">
						<label>Academic Year</label>
						<input readonly type="text" class="form-control academicYear" value="<?php echo $academic_year ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Course</label>
						<input readonly type="text" class="form-control course" value="<?php echo $course ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Year Level</label>
						<input readonly type="text" class="form-control academicLevel" value="<?php echo $academic_level ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Semester</label>
						<input readonly type="text" class="form-control semester" value="<?php echo $semester ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Status</label>
						<input readonly type="text" class="form-control status" value="<?php echo $status ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Section</label>
						<input readonly type="text" class="form-control sectionName" value="<?php echo $sectionName ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Subject Code</label>
						<input readonly type="text" class="form-control sectionName" value="<?php echo $subject_code ?>">
					</div>
					<div class="col-md-4 form-group">
						<label>Subject Description</label>
						<input readonly type="text" class="form-control sectionName" value="<?php echo $subject_description ?>">
					</div>

				</div>
				<br>
				<h3>List of Students</h3>
				<br>
				<table id="example" class="sectionTable table table-striped table-bordered" style="width: 100%">
					<thead>
						<tr>
							<th style="text-align: center;">LRN</th>
							<th style="text-align: center;">Name</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listofallstudent as $value): ?>
							<tr>
								<td style="text-align: center;"><?php echo $value['lrn'] ?></td>
								<td style="text-align: center;"><?php echo $value['name'] ?></td>
								<td style="text-align: center;">
									<a href="my-students-list" title="View" data-toggle="tooltip" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>