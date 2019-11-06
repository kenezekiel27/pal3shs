
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
				<div class="row">
					<button class="btn btn-success">Grade11 1st Semester</button>
					<button class="btn btn-success">Grade11 2nd Semester</button>
					<button class="btn btn-success">Grade12 1st Semester</button>
					<button class="btn btn-success">Grade12 2nd Semester</button>
				</div>
				<br>
				<div class="coursesubject">
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
				<div class="subjectToAdd" style="display: none;">
					<p>Add subject</p>
					 <?php 
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
					  ?>
					  
					<select class="subjects" name="subjects[]" multiple="multiple"  style="width: 100% !important">
						<?php foreach ($subjects as $value): ?>
							<option  value=<?php echo $value->id ?> style="width: 100% !important"><?php echo $value->subject_description ?></option>
						<?php endforeach ?>
					</select>
					<br><br>
					<button class="btn btn-success saveBtn" style="display: none;">Add Subject</button>
				</div>
				<button class="btn btn-danger removeCourse" style="float: right;" >Remove Course</button><br>
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
	<br><br>
	<div class="modal fade" id="importSubject" style="height: 700px;">
	    <div class="modal-dialog modal-dialog-centered ">
	      <div class="modal-content">
	      
	        <!-- Modal Header -->
	        <div class="modal-header">
	          <h4 class="modal-title">Import subject from other course</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        
	        <!-- Modal body -->
	        <div class="modal-body ">
	        	<div class="importSubjectData">
	        		<p class="importsubjectwarning"></p>
	        		<p>Select course</p>
		         	<select class="allcourse form-control" style="width: 100% !important">
		         		
					</select>
					<br><br>
					<p>Select Year level</p>
					<select class="importyearlevel" multiple="multiple" style="width: 100% !important">
						<option value="Grade 11">Grade 11</option>
						<option value="Grade 12">Grade 12</option>
					</select>
					<br><br>
					<p>Select Semester</p>
					<select class="importsem" multiple="multiple" style="width: 100% !important">
						<!-- <option value="First Sem">1st Sem</option>
						<option value="Second Sem">2nd Sem</option> -->
					</select>
					<br><br><br>
	        	</div>
	         	<div class="showwhennodata" style="display: none; font-size: 25px;text-align: center;">
	         		<br>
	         		<p>All courses have no subjects yet.</p>
	         		<br>
	         	</div>
	        </div>
	        
	        <!-- Modal footer -->
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-primary importBtn">Import</button>
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        </div>
	        
	      </div>
	    </div>
	</div>
	<!-- end of page content -->

