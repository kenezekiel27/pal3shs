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
					<h4 class="page-title">Class Advisory</h4>
				</div>
			</div>
			<!-- section 1 -->
			<div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<div class="form-material academic_info">
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Course</label>
									<input type="text" class="form-control" value="<?php echo $sectiondata['course'] ?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Academic year</label>
									<input type="text" class="form-control" value="<?php echo $sectiondata['academic_year'] ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Academic Level</label>
									<input type="text" class="form-control" value="<?php echo $sectiondata['academic_level'] ?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Semester</label>
									<input type="text" class="form-control" value="<?php echo $sectiondata['semester'] ?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Section</label>
									<input type="text" class="form-control" value="<?php echo $sectiondata['section_name'] ?>">
								</div>
							</div>
						</div>
						<br>
						<label>List of Advisory Student</label>
						<br><br>
						<table id="example" class="sectionTable table table-striped table-bordered" style="width: 100%">
							<thead>
								<tr>
									<th style="text-align: center;">Lrn</th>
									<th style="text-align: center;">Last Name</th>
									<th style="text-align: center;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if (count($advisory) > 0): ?>
									<?php foreach($advisory as $value): ?>
										<tr>
											<td style="text-align: center;"><?php echo $value['lrn']?></td>
											<td style="text-align: center;"><?php echo $value['fullname']?></td>
											<td style="text-align: center;">
												<a href="#" title="view" data-toggle="tooltip"  class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
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