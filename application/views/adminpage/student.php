
	<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/table.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/adminpage.css">
	<!-- page content -->
	
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row bg-title">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h4 class="page-title">Student</h4>
				</div>
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                        <li class="active">Student</li>
                    </ol>
                </div>
			</div>
			<!-- Section 1 -->
			<div class="row">
				<div class="white-box">
					<h3 class="box-title">Students' List</h3>
					<hr>
					<table id="example" class="sectionTable table table-striped table-bordered" style="width: 100%">
						<thead>
							<tr>
								<th>Lrn</th>
								<th>Name</th>
								<th>Course</th>
								<th>Academic Level</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $key ?>
							<?php 
								foreach ($student_info as $key => $value) {
									$new = json_decode($value->personal_info,true);
									foreach ($new as $key => $value2) {
										?>
											<tr class="row-<?php echo $key  ?>">
												<td><?php echo $value->lrn?></td>
												<td><?php echo $value2['lname'].', '.$value2['fname'].' '.$value2['mname'] ?></td>
												<?php
													$new1 = json_decode($value->acad_level,true);
													foreach ($new1 as $key => $value3) {
													 	?>
													 		<td><?php echo $value3['course'] ?></td>
													 		<td><?php echo $value3['acad_level'].' '.$value3['semester'].' '.$value3['acad_year'] ?></td>
													 		<td>
													 			<center>
					                            					<a href="<?php echo base_url(); ?>student2/<?php echo $value->id?>" title="Edit" data-toggle="tooltip"  class="btn btn-success btn-sm updateBtn<?php echo $value->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					                            					<button  title="Remove" data-toggle="tooltip" class="btn btn-danger removed_course btn-sm" id="<?php echo $value->id;?>" ><i class="fa fa-times" id="<?php echo $value->id ?>"></i></button>
					                            				</center>
													 		</td>
													 		
													 	<?php
													 } 
												?>
											</tr>
										<?php
									}
								}

							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- end of page content -->
