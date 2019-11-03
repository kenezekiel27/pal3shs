
	<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/table.css">
	<!-- page content -->
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
			<!-- Section 1 -->
			<div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<button data-toggle ="modal" data-target="#add_subject_form" class="btn btn-success add_subjectBtn" type="button">Add Subject</button>
						<hr>
						<h3>List of Subject</h3>
						<br>
						<table id="example" class="table table-striped table-bordered" style="width: 100%">
							<thead>
								<tr>
									<th>Subject Code</th>
									<th>Subject Description</th>
									<th>Subject Type</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- end of Section 1 -->
			<!-- add Subject section -->
			<div class="modal" id="add_subject_form">
				<div class="container add_subject" id="add_subject_form_body">
					<br><br>
					<center><p style="font-size: 20px; font-weight: bold">Add Subject</p></center>
					<span class="close close_form" data-dismiss="modal">&times;</span>
					<br>
					<p class="add_subject_warning" style="display: none;"></p>
					<div class="modal_body form-material">
						
						<label>Subject Code</label>
			            <input type="text" id="subject_code" class="form-control">
						<br>
						<label>Subject Description</label>
						<input type="text" id="subject_description" class="form-control">
						<br>
						<label>Subject Type</label>
						<select type="text" id="subject_type"class="form-control">
							<option selected disabled>Select</option>
							<option>applied</option>
							<option>core</option>
							<option>specialized</option>
						</select> 
						<br>
						<button class="btn btn-success add_new_subject" type="button" style="width: 20%; float: left;">Add</button>
						<br><br><br>
					</div>
				</div>
			</div>
			<!-- end of add Subject section -->
		</div>
	</div>
	<!-- end of page content -->
