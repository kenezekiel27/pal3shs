<!--  -->
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
							
					<div class="col-md-5 form-group forCourse">
						<input readonly type="text" class="form-control courseDescription" id="courseDescription" value="<?php echo $course['course_name']; ?>">
						
						<input type="text" class="id" value="<?php echo $course['id'] ?>" hidden>
						<input type="hidden" class="originalStrand" value="<?php echo $course['academic_track']?>">
						<input type="hidden" class="originalDescription" value="<?php echo $course['academic_strand'] ?>">
					</div>
					<ul class="courseUl" >
						<li><button class="btn btn-success viewAvailableSubjectBtn" >Add Subject</button></li>
						<li><button  class="btn btn-success courseSubjectBtn">Subjects</a></li>
						<li><button class="btn btn-success importSubjectBtn" data-toggle="modal" data-target="#importSubject">Import Subject</button></li>
					</ul>
					<br><br><br>
					<div class="newCourse" id="newCourse" style="display: none;">
						<p class="updatecoursenamewarning" id="newCourse" style="position: relative; z-index: 200"></p>
						<p id="newCourse">Academic Strand</p>
						<ul class="forAcademicStrand">
							<li><input id="newCourse" type="text" class="form-control newAcademicStrand" value="<?php echo $course['academic_track'] ?>"></li>
							<li><button id="newCourse" title="Save" data-toggle="tooltip" class="btn btn-success btn-sm saveStrand" ><i id="newCourse" class="fa fa-check	"></i></button></li>
						</ul>
						<br><br><br>
						<p id="newCourse">Academic Description</p>
						<ul>
							<li><input id="newCourse" type="text" class="form-control newAcademicDescription" value="<?php echo $course['academic_strand'] ?>"></li>
							<li><button id="newCourse" title="Save" data-toggle="tooltip" class="btn btn-success btn-sm saveDescription" ><i id="newCourse" class="fa fa-check	"></i></button></li>
						</ul>
					</div>
				</div>
				<div class="coursesubject" style="display: nosne;">
					<h4><strong>List of Subjects</strong></h4>
					<div class="addsubjecttocoursewarning2"></div>
					<br>
					<p>Grade</p>
					<select class="form-control viewyearlevel" style="width: 100% !important">
						<option selected disabled value="default">Select year level</option>
						<option value="Grade 11">Grade 11</option>
						<option value="Grade 12">Grade 12</option>
					</select><br>
					<p>Semester</p>
					<select class="form-control viewsemester" style="width: 100% !important">
						<option selected disabled value="default">Select semester</option>
						<option value="1st Sem">1st Sem</option>
						<option value="2nd Sem">2nd Sem</option>
					</select>
					<br>
					<div class="listofsubject" style="display: none;">

						<p class="listofsubjecttext"></p>
						<select class="removesubjects" name="removesubjects[]" multiple="multiple"  style="width: 100% !important">
							
						</select>
					</div>
					<br><br>
					<button class="btn btn-danger removeBtn" style="display: none;">Remove Subject</button>
				</div>
				<div class="subjectToAdd" style="display: none;">
					<h4><strong>Add Subject</strong></h4>
					<div class="addsubjecttocoursewarning"></div>
					<br>
					<p>Grade</p>
					<select class="form-control yearlevel" name="yearlevel"   style="width: 100% !important">
						<option selected disabled value="default">Select year level</option>
						<option value="Grade 11">Grade 11</option>
						<option value="Grade 12">Grade 12</option>
					</select><br><br>
					<p>Semester</p>
					<select class="form-control semester" name="semester"   style="width: 100% !important">
						<option selected disabled value="default">Select semester</option>
						<option value="1st Sem">1st Sem</option>
						<option value="2nd Sem">2nd Sem</option>
					</select>
					<br><br>
					 <div class="listofavailablesubject" style="display: none;">
					 	<p>Available subject</p>
					 	<select class="subjects" name="subjects[]" multiple="multiple"  style="width: 100% !important">
							<?php foreach ($subjects as $value): ?>
								<option  value=<?php echo $value->id ?> style="width: 100% !important"><?php echo $value->subject_description ?></option>
							<?php endforeach ?>
						</select>
					 </div>
					
					<br><br>
					<button class="btn btn-success saveBtn" style="display: none;">Add Subject</button>
				</div>
				<button class="btn btn-danger removeCourse" style="float: right;" >Remove Course</button><br>
			</div>
			
			<!-- end of Section 1 -->
		</div>
	</div>
	<br><br>

	
	<div class="modal fade" id="importSubject" style="height: 700px;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Import subject from other course</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

         	<p>Select course</p>
         	<select class="allcourse" style="width: 100% !important">
			</select>
			<br><br>
			<p>Select Year level</p>
			<select class="importyearlevel" multiple="multiple" style="width: 100% !important">
				<option value="Grade 11">Grade 11</option>
				<option value="Grade 12">Grade 12</option>
			</select>
			<br><br>
			<p>Select Semester</p>
			<select class="importyearlevel" multiple="multiple" style="width: 100% !important">
				<option value="First Sem">1st Sem</option>
				<option value="Second Sem">2nd Sem</option>
			</select>
			<br><br><br>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        	<button type="button" class="btn btn-primary">Import</button>
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
	<!-- end of page content -->

