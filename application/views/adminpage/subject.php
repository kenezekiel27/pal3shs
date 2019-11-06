
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
								<?php $key ?>
								<?php foreach ($subjects as $key => $value): ?>
									<tr class="row-<?php echo $value->id;?>">
										<td><?php echo $value->subject_code ?></td>
										<td><?php echo $value->subject_description ?></p></td>
										<td><?php echo $value->subject_type ?></td>
										<td>
											<center>
                            					<a href="<?php echo base_url();?>subject/<?php echo $value->id?>" title="Edit" data-toggle="tooltip"  class="btn btn-success btn-sm updateSubjectBtn<?php echo $value->id  ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></a>
                            					<!-- <button title="Edit" data-toggle="tooltip"  class="btn btn-success btn-sm updateBtn" id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" id="<?php echo $value->id ?>"></i></button> -->
                            					<button  title="Remove" data-toggle="tooltip" class="btn btn-danger remove_subject btn-sm" id="<?php echo $value->id ?>"><i class="fa fa-times" id="<?php echo $value->id ?>"></i></button>
                            				</center>
										</td>
									</tr>
								<?php endforeach ?>
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
					<center><p style="font-size: 20px; font-weight: lighter;">Add Subject</p></center>
					<span class="close close_form" data-dismiss="modal">&times;</span>
					<hr>
					<p class="add_subject_warning" style="font-weight: lighter;"></p>
					<div class="modal_body form-material">
						
						<center><label>Subject Code</label></center>
			            <input type="text" id="subject_code" class="form-control" style="text-align: center; font-weight: lighter;">
						<br>
						<center><label>Subject Description</label></center>
						<input type="text" id="subject_description" class="form-control" style="text-align: center; font-weight: lighter;">
						<br>
						<center><label>Subject Type</label></center>
						<select type="text" id="subject_type"class="form-control"style="text-align: center; font-weight: lighter; padding-left: 136px">
							<option selected disabled>Select</option>
							<option>applied</option>
							<option>core</option>
							<option>specialized</option>
						</select> 
						<br>
						<center><button class="btn btn-success add_new_subject" type="button" style="width: 40%;">Add</button></center>
						<br><br><br>
					</div>
				</div>
			</div>
			<!-- end of add Subject section -->
		</div>
	</div>
	<!-- end of page content -->
