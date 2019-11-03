
	<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/table.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/adminpage.css">
	<!-- page content -->
	
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row bg-title">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h4 class="page-title">Manage Course</h4>
				</div>
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Manage</a></li>
                        <li class="active">Manage Course</li>
                    </ol>
                </div>
			</div>
			<!-- Section 1 -->
			<div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<button data-toggle ="modal" data-target="#add_course_form" class="btn btn-success add_courseBtn" type="button">Add Course</button>
						<hr>
						<?php $total = 0; ?>
						<?php foreach ($courses as $value): ?>
							<?php $total++; ?>
						<?php endforeach ?>
						<h3>Available Course <span style="font-size: 15px;">( <span class="totalno"><?php echo $total ?></span> )</span></h3>
						<br>
						<table id="example" class="table table-striped table-bordered" style="width: 100%">
							
							<thead>
								<tr>
									<th style="text-align: center;"></th>
									<th style="text-align: center;">Course Name</th>
									<th style="text-align: center;">Action</th>
								</tr>
							</thead>
							<tbody>	

								<?php $key ?>
								<?php foreach ($courses as $key => $value): ?>
									<tr class="row-<?php echo $value->id;?>">
										<td><?php echo $key+1 ?></td>
										<td><p style="color: black;"><?php echo $value->course_name ?></p></td>
										<td>
                            				<center>
                            					<a href="<?php echo base_url();?>course/<?php echo $value->id?>" title="Edit" data-toggle="tooltip"  class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></a>
                            					<!-- <button title="Edit" data-toggle="tooltip"  class="btn btn-success btn-sm updateBtn" id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" id="<?php echo $value->id ?>"></i></button> -->
                            					<button  title="Remove" data-toggle="tooltip" class="btn btn-danger removed_course btn-sm" id="<?php echo $value->id;?>" ><i class="fa fa-times" id="<?php echo $value->id ?>"></i></button>
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
			<!-- add course section -->
			<div class="modal" id="add_course_form">
				<div class="container add_course" id="add_course_form_body">
					<br><br>
					<center><p style="font-size: 20px; font-weight: lighter; float: left;">Add Course</p></center>
					<br><br>
					<span class="close close_form" data-dismiss="modal">&times;</span>
					<hr>
					<div class="add_course_warning" style="font-weight: lighter;"></div>
					<div class="modal_body form-material">
						
						<center><label>Academic Track</label></center>
			            <input type="text" id="track" class="form-control" style="text-align: center; font-weight: lighter;" placeholder="Enter track">
						<br><br><br>
						<center><label>Academic Strand</label></center>
						<input type="text" id="strand" class="form-control" style="text-align: center; font-weight: lighter;" placeholder="Enter description">
						<br><br><br>
						<center><button class="btn btn-success add_new_course" type="button" style="width: 40%;text-align: center;">Submit</button></center>
						<br><br><br>
					</div>
				</div>
			</div>
			<!-- end of add course section -->
		</div>
	</div>
	<!-- end of page content -->
