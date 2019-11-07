
	<!-- Page Content -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/table.css">
	<br>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row bg-title">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h4 class="page-title">Dashboard</h4> 
				</div>
			</div>
			<!-- Data Widgets -->
			<div class="row">
				<div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Total Visit</h3>
                        <ul class="list-inline two-part">
                            <li>
                                <div id="sparklinedash"></div>
                            </li>
                            <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">659</span></li>
                        </ul>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-6 col-xs-12">
					<div class="white-box analytics-info">
						<h3 class="box-title">Total Number of Students</h3>
						<ul class="list-inline two-part">
	                        <li>
	                            <div id="sparklinedash2"></div>
	                        </li>
	                        <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">2312</span></li>
	                    </ul>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Total Number of Teacher</h3>
                        <ul class="list-inline two-part">
                            <li>
                                <div id="sparklinedash3"></div>
                            </li>
                            <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">3123</span></li>
                        </ul>
                    </div>
                </div>
			</div>
			<!-- End of Data Widgets -->
			<!-- Table content -->
			<div class="row">
				<div class="white-box">
					<h3 class="box-title">Student List</h3>
					<hr>
					<table id="example" class="sectionTable table table-striped table-bordered" style="width: 100%">
						<thead>
							<tr>
								<th>Lrn</th>
								<th>Name</th>
								<th>Course</th>
								<th>Academic Level</th>
								<th>Academic Year</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="white-box">
					<h3 class="box-title">Teacher List</h3>
					<hr>
					<table id="example1" class="sectionTable table table-striped table-bordered" style="width: 100%">
						<thead>
							<tr>
								<th>Lrn</th>
								<th>Last Name</th>
								<th>First Name</th>
								<th>Middle Name</th>
							</tr>
						</thead>
						<tbody>

							<?php $key ?>
							<?php 
								foreach ($personal_info as $key => $value) {
									$new = json_decode($value->personal_info,true);
									foreach ($new as $key => $value2) {
										?>
											<tr class="row-<?php echo $key  ?>">
												<td><?php echo $value->lrn?></td>
												<td><?php echo $value2['lname'] ?></td>
												<td><?php echo $value2['fname'] ?></td>
												<td><?php echo $value2['mname'] ?></td>
											</tr>
										<?php
									}
								}

							 ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="white-box">
					<h3 class="box-title">List of Accounts</h3>
					<hr>
					<table id="example2" class="sectionTable table table-striped table-bordered" style="width: 100%">
						<thead>
							<tr>
								<th>Lrn</th>
								<th>Full Name</th>
								<th>Username</th>
								<th>Password</th>
								<th>Role</th>
								<th>Status</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
			
			<!-- Table content -->
		</div>
	</div>
	<!-- End of Page Content -->
