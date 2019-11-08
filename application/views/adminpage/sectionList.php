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

			<div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<button data-toggle ="modal" data-target="#add_section_form" class="btn btn-success add_sectionBtn" type="button">Add Section</button>
						<hr>
						<h3>List of Section</h3>
						<br>
					</div>
				</div>
			</div>

			<div class="modal" id="add_section_form">
				<div class="container add_section" id="add_section_form_body">
					
					<br><br>
					<center><p style="font-size: 20px; font-weight: lighter;">Add Subject</p></center>
					<span class="close close_form" data-dismiss="modal">&times;</span>
					<hr>
					<p class="add_subject_warning" style="font-weight: lighter;"></p>

				</div>
			</div>


		</div>
	</div>