	<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/table.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/adminpage.css">

	<!-- page content -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row bg-title">
				<div div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h4 class="page-title">Pending Registration</h4>
				</div>
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Registration</a></li>
                        <li class="active">Pending Registration</li>
                    </ol>
                </div>
			</div>
			<!-- section 1 -->
			<div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<h3 class="box-title">Student's List</h3>
						<table id="example" class="table table-striped table-bordered" style="width: 100%">
							<thead>
								<tr>
									<th style="text-align: center;">LRN</th>
									<th style="text-align: center;">Last Name</th>
									<th style="text-align: center;">First Name</th>
									<th style="text-align: center;">Middle Name</th>
									<th style="text-align: center;">Academic Status</th>
									<th style="text-align: center;">Action</th>
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
													<td><?php echo $value2['lname'] ?></td>
													<td><?php echo $value2['fname'] ?></td>
													<td><?php echo $value2['mname'] ?></td>
													<td>
														<?php
															$new1 = json_decode($value->acad_level,true);
															foreach ($new1 as $key => $value3) {
															 	echo $value3['acad_status'];
															 } 
														?>
													</td>
													<td>
			                            				<center>
			                            					<a href="<?php echo base_url(); ?>student-information/<?php echo $value->id?>" title="View" data-toggle="tooltip" class="btn btn-success btn-sm viewBtn<?php echo $value->id ?>"><i class="fa fa-eye"></i></a>
			                            					<a href="#" title="confirm" data-toggle="tooltip"  class="btn btn-success btn-sm updateBtn<?php echo $value->id ?>"  ><i class="fa fa-check" aria-hidden="true" ></i></a>
			                            					<button  title="Remove" data-toggle="tooltip" class="btn btn-danger removed_course btn-sm" id="<?php echo $value->id;?>" ><i class="fa fa-times" id="<?php echo $value->id ?>"></i></button>
			                            				</center>
			                            			</td>
												</tr>
											<?php
										}
									}
							 	?>
							</tbody>
						</table>
						<h3 class="box-title">Teacher's List</h3>
						<table id="example1" class="table table-striped table-bordered" style="width: 100%">
							<thead>
								<tr>
									<th style="text-align: center;">LRN</th>
									<th style="text-align: center;">Last Name</th>
									<th style="text-align: center;">First Name</th>
									<th style="text-align: center;">Middle Name</th>
									<th style="text-align: center;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $key ?>
								<?php 
									foreach ($teacher_info as $key => $value) {
										$new = json_decode($value->personal_info,true);
										foreach ($new as $key => $value2) {
											?>
												<tr class="row-<?php echo $key  ?>">
													<td><?php echo $value->lrn?></td>
													<td><?php echo $value2['lname'] ?></td>
													<td><?php echo $value2['fname'] ?></td>
													<td><?php echo $value2['mname'] ?></td>
													<td>
			                            				<center>
			                            					<a href="#" title="View" data-toggle="tooltip" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
			                            					<a href="#" title="confirm" data-toggle="tooltip"  class="btn btn-success btn-sm updateBtn<?php echo $value->id ?>"  ><i class="fa fa-check" aria-hidden="true" ></i></a>
			                            					<button  title="Remove" data-toggle="tooltip" class="btn btn-danger removed_course btn-sm" id="<?php echo $value->id;?>" ><i class="fa fa-times" id="<?php echo $value->id ?>"></i></button>
			                            				</center>
			                            			</td>
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
			<!-- end of section 1 -->
		</div>
	</div>
	<!-- end of page content -->