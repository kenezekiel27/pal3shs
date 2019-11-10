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


		</div>
	</div>