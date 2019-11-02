
	<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/table.css">
	
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
			<div class="white-box" >
				<div class="row form-material">
							
					<div class="col-md-5 form-group">
						<input style="font-weight: bold;" readonly type="text" class="form-control" value="<?php echo $course['course_name']; ?>">
						<input type="text" class="id" value="<?php echo $course['id'] ?>" hidden>

					</div>
					<ul class="courseUl">
						<li><button class="btn btn-success viewAvailableSubjectBtn" style="float: right; ">Add Subject</button></li>
						<li><button  class="btn btn-success courseSubjectBtn" style="float: right;">Subjects</a></li>
					</ul>
					
				</div>
				<div class="coursesubject" style="display: none;">
					<p>List of subject for this course</p>
					<?php $data = json_decode($course['subject_ids'], true); ?>
					<select class="removesubjects" name="removesubjects[]" multiple="multiple"  style="width: 100% !important">
						<?php foreach ($data as $value): ?>
							<?php 
								foreach ($subjects as $key => $value2){
						 			if ($value['id'] == $value2->id) {
						 				?>
						 					<option  value=<?php echo $value['id'] ?> style="width: 100% !important"><?php echo $value2->subject_description ?></option>
						 				<?php
						 			}
						 		}

							 ?>
							
						<?php endforeach ?>
					</select>
					<br><br>
					<button class="btn btn-danger removeBtn" style="display: none;">Remove Subject</button>
				</div>
				<div class="subjectToAdd" style="display: nsone;">
					<br><br>
					<div class="addsubjecttocoursewarning"></div>
					<br>
					<p>Grade</p>
					<select class="form-control yearlevel" name="yearlevel"   style="width: 100% !important">
						<option selected disabled >Select year level</option>
						<option value="Grade 11">Grade 11</option>
						<option value="Grade 12">Grade 12</option>
					</select><br><br>
					<p>Semester</p>
					<select class="form-control semester" name="semester"   style="width: 100% !important">
						<option selected disabled >Select semester</option>
						<option value="1st Sem">1st Sem</option>
						<option value="2nd Sem">2nd Sem</option>
					</select>
					<br><br>
					
					 <!-- <?php 
					 	$data = json_decode($course['subject_ids'], true);
					 	if(is_array($data)){
					 		foreach ($data as $value) {
						 		foreach ($subjects as $key => $value2){
						 			if ($value['id'] == $value2->id) {
						 				unset($subjects[$key]);
						 			}
						 		}
						 	}
						 	
					 	}
					  ?> -->
					 <div class="forgrade11one" style="display: none;">
					 	<p>Available subject</p>
					 	<select class="subjects" name="subjects[]" multiple="multiple"  style="width: 100% !important">
							<!-- <?php foreach ($subjectsto as $value): ?>
								<option  value=<?php echo $value->id ?> style="width: 100% !important"><?php echo $value->id ?></option>
							<?php endforeach ?> -->
						</select>
					 </div>
					<!-- <select class="subjects" name="subjects[]" multiple="multiple"  style="width: 100% !important">
						<?php foreach ($subjects as $value): ?>
							<option  value=<?php echo $value->id ?> style="width: 100% !important"><?php echo $value->subject_description ?></option>
						<?php endforeach ?>
					</select> -->
					<br><br>
					<button class="btn btn-success saveBtn" style="display: none;">Add Subject</button>
				</div>
				<!-- <table id="example" class="table table-striped table-bordered" style="width: 100%">
							
					<thead>
						<tr>
							<th >Subject Code</th>
							<th >Subject Description</th>
							<th >Action</th>
						</tr>
					</thead>
					<tbody>	

						<?php $key ?>
						<?php foreach ($subjects as $key => $value): ?>
							<tr class="row-<?php echo $value->id;?>">
								<td><?php echo $value->subject_code; ?></td>
								<td><p style="color: black;"><?php echo $value->subject_description ?></p></td>
								<td>
                    				<a href="<?php echo base_url();?>course/<?php echo $value->id?>" title="Edit" data-toggle="tooltip"  class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></a>
                    				<button  title="Remove" data-toggle="tooltip" class="btn btn-danger removed_course btn-sm" id="<?php echo $value->id;?>" ><i class="fa fa-times" id="<?php echo $value->id ?>"></i></button>
                    			</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table> -->
			</div>
			
			<!-- end of Section 1 -->
		</div>
	</div>
	
	<!-- end of page content -->

