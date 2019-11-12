<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/table.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/adminpage.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

	<!-- page content -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row bg-title">
				<div div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h4 class="page-title">Student Account</h4>
				</div>
			</div>
			<!-- section 1 -->
			<div class="row">
				<div class="col-md-4 col-xs-12">
                    <div class="white-box">
                        <div class="user-bg"> <img width="100%" alt="user">
                            <div class="overlay-box">
                                <div class="user-content">
                                    <a href="javascript:void(0)"><img>
                                            class="thumb-lg img-circle" alt="img"></a>
                                    <h4 class="text-white">User Name</h4>
                                    <h5 class="text-white">info@myadmin.com</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-8 col-xs-12">
					<div class="white-box">
						 <form class="form-horizontal form-material">
                            <div class="form-group">
                                <label class="col-md-12">Username</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="example-email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
			</div>
			<!-- end of section 1 -->
		</div>
	</div>
	<!-- end of page content -->
	<script type="text/javascript">
		$('#update_bday').datepicker();
	</script>