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
					<br>
					<h3>List of Section</h3>
					<br>
					<table id="example" class="sectionTable table table-striped table-bordered" style="width: 100%">
						<thead>
							<tr>
								<th style="text-align: center;">Academic Year</th>
								<th style="text-align: center;">Academic Level</th>
								<th style="text-align: center;">Status</th>
								<th style="text-align: center;">Course</th>
								<th style="text-align: center;">Semester</th>
								<th style="text-align: center;">Section</th>
								<th style="text-align: center;">Subject Code</th>
								<th style="text-align: center;">Subject Description</th>
								<th style="text-align: center;">Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php foreach($allstudent as $value): ?>
								<tr>
									<td style="text-align: center;"><?php echo $value['academic_year'] ?></td>
									<td style="text-align: center;"><?php echo $value['academic_level'] ?></td>
									<td style="text-align: center;"><?php echo $value['status'] ?></td>
									<td style="text-align: center;"><?php echo $value['course'] ?></td>
									<td style="text-align: center;"><?php echo $value['semester'] ?></td>
									<td style="text-align: center;"><?php echo $value['sectionName'] ?></td>
									<td style="text-align: center;"><?php echo $value['subject_code'] ?></td>
									<td style="text-align: center;"><?php echo $value['subject_description'] ?></td>
									<td style="text-align: center;">
										<button href="<?php echo base_url();?>subject/<?php echo $value['id']?>" title="View" data-toggle="tooltip" class="btn btn-success btn-sm viewStudent" id="<?php echo $value['id'] ?>"><i id="<?php echo $value['id'] ?>" class="fa fa-eye"></i></button>
									</td>
									<input type="hidden" class="academic_year<?php echo $value['id'] ?>" value="<?php echo $value['academic_year'] ?>">
									<input type="hidden" class="academic_level<?php echo $value['id'] ?>" value="<?php echo $value['academic_level'] ?>">
									<input type="hidden" class="status<?php echo $value['id'] ?>" value="<?php echo $value['status'] ?>">
									<input type="hidden" class="course<?php echo $value['id'] ?>" value="<?php echo $value['course'] ?>">
									<input type="hidden" class="semester<?php echo $value['id'] ?>" value="<?php echo $value['semester'] ?>">
									<input type="hidden" class="sectionName<?php echo $value['id'] ?>" value="<?php echo $value['sectionName'] ?>">
									<input type="hidden" class="subject_code<?php echo $value['id'] ?>" value="<?php echo $value['subject_code'] ?>">
									<input type="hidden" class="subject_description<?php echo $value['id'] ?>" value="<?php echo $value['subject_description'] ?>">
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>