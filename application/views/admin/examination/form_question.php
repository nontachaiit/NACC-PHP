<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title><?php echo $this->config->item("project_name"); ?> - แบบฟอร์มคำถาม</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<?php
		echo plugin_css_asset ( "admin/bootstrap/css/bootstrap.min.css" );
		echo plugin_css_asset ( "admin/font-awesome/css/font-awesome.min.css" );
		
		echo css_asset ( "admin/main.css" );
		echo css_asset ( "admin/main-responsive.css" );
		echo plugin_css_asset ( "admin/iCheck/skins/all.css" );
		echo plugin_css_asset ( "admin/bootstrap-colorpalette/css/bootstrap-colorpalette.css" );
		echo plugin_css_asset ( "admin/perfect-scrollbar/src/perfect-scrollbar.css");
		echo css_asset ( "admin/theme_light.css" );
		echo css_asset ( "admin/print.css", null, array ( "media" => "print") );
		
		?>
		<link rel="stylesheet" href="<?php echo other_asset_url( "fonts/style.css"); ?>">
		
		<!--[if IE 7]>
		<?php
		echo plugin_css_asset ( "admin/font-awesome/css/font-awesome-ie7.min.css" );
		?>
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<?php
		echo plugin_css_asset ( "admin/fullcalendar/fullcalendar/fullcalendar.css" );
		?>
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		
		
		<link rel="shortcut icon" href="<?php echo image_asset_url ( "favicon.ico"); ?>" />
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<?php $this->load->view ( "admin/header" ); ?>
		
		<!-- start: MAIN CONTAINER -->
		<div class="main-container">
			<div class="navbar-content">
				<?php $this->load->view ( "admin/menu" ); ?>
			</div>
			<!-- start: PAGE -->
			<div class="main-content">
				<!-- start: PANEL CONFIGURATION MODAL FORM -->
				<div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
								</button>
								<h4 class="modal-title">Panel Configuration</h4>
							</div>
							<div class="modal-body">
								Here will be a configuration form
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
									Close
								</button>
								<button type="button" class="btn btn-primary">
									Save changes
								</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<!-- end: SPANEL CONFIGURATION MODAL FORM -->
				<div class="container">
					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">
							
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-home-3"></i>
									<a href="#">
										รายงานผล
									</a>
								</li>
								<li>
									<a href="<?php echo site_url( "office/examination/manage/" . $section->alias . "/" . $level->id); ?>">
										จัดการแบบทดสอบ <?php echo $section->name; ?> <?php echo $level->name; ?>
									</a>
								</li>
								<li class="active">
									<?php
									echo ( $question == null )? "สร้างคำถามเพิ่ม": "แก้ไขคำถาม";
									?>
								</li>
							</ol>
							<div class="page-header">
								<h1><?php echo ($question == null? "Create a new question": "Edit a question"); ?> <small>กรอกคำถาม และตัวเลือกคำตอบทั้ง 4 ตัวเลือก</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-sm-12">
                                                        
							<!-- start: BASIC TABLE PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									แบบฟอร์มข้อมูล
									<div class="panel-tools">
									</div>
								</div>
								<div class="panel-body">
									<form action="<?php echo site_url( "office/examination/formQuestion/" . $section->alias . "/" . $level->id . ($question == null? "": "/" . $question->id)); ?>" method="post" accept-charset="utf-8" role="form" class="form-horizontal" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-2 control-label" for="form-field-question">
												คำถาม: <span style='color: red;'>*</span>
											</label>
											<div class="col-sm-9">
												<textarea  id="form-field-question" class="form-control" name="question" rows="3"><?php echo set_value( "question", $question != null? $question->question: "");?></textarea>
												<?php echo form_error ( "question" ); ?>
											</div>
										</div>
										
										<hr />
										
										<?php
										$rightAnswer = 0;
										$answer1 = null;
										$answer2 = null;
										$answer3 = null;
										$answer4 = null;
										
										$fix_position_1 = 0;
										$fix_position_2 = 0;
										$fix_position_3 = 0;
										$fix_position_4 = 0;
										
										if ( $question != null ) {
											if ( count($choices) > 0 ) {
												$answer1 = $choices[0];
												$fix_position_1 = set_value("fix_position_1", $answer1->is_fix_position);
												if ( $answer1->is_right == 1 ) $rightAnswer = 1;
											}
											
											if ( count($choices) > 1 ) {
												$answer2 = $choices[1];
												$fix_position_2 = set_value("fix_position_2", $answer2->is_fix_position);
												if ( $answer2->is_right == 1 ) $rightAnswer = 2;
											}
											if ( count($choices) > 2 ) {
												$answer3 = $choices[2];
												$fix_position_3 = set_value("fix_position_3", $answer3->is_fix_position);
												if ( $answer3->is_right == 1 ) $rightAnswer = 3;
											}
											if ( count($choices) > 3 ) {
												$answer4 = $choices[3];
												$fix_position_4 = set_value("fix_position_4", $answer4->is_fix_position);
												if ( $answer4->is_right == 1 ) $rightAnswer = 4;
											}
										}
										
										$rightAnswer = set_value("right_answer", $rightAnswer);
										?>
										<div class="form-group">
											<label class="col-sm-2 control-label">
											</label>
											<div class="col-sm-9">
												<span style="color: #00d;">การกรอกคำตอบไม่จำเป็นต้องเรียงลำดับ เพราะโปรแกรมจะทำการสุ่มลำดับการแสดงผลของตัวเลือกคำตอบเองโดยอัตโนมัติ</span><br />
												<div style="color: #d00; margin-top: 8px;">คลิกที่ Checkbox หน้าตัวเลือกคำตอบ กรณีที่ต้องการ Fix ตำแหน่งของคำตอบ ตัวอย่างเช่นคำตอบประเภท ถูกทุกข้อ, ถูกข้อ ก. และ ค., ไม่มีข้อถูก</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="form-field-answer1">
												<input type="checkbox" name="fix_position_1" value="1" <?php echo $fix_position_1 == 1? "checked='checked'": ""; ?>/>&nbsp;&nbsp;
												คำตอบ 1: <span style='color: red;'>*</span>
											</label>
											<div class="col-sm-9">
												<input type="text" id="form-field-answer1" class="form-control" name="answer1" value="<?php echo set_value("answer1", $answer1 == null? "": $answer1->answer);?>">
												<?php echo form_error ( "answer1" ); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="form-field-answer2">
												<input type="checkbox" name="fix_position_2" value="1" <?php echo $fix_position_2 == 1? "checked='checked'": ""; ?>/>&nbsp;&nbsp;
												คำตอบ 2: <span style='color: red;'>*</span>
											</label>
											<div class="col-sm-9">
												<input type="text" id="form-field-answer2" class="form-control" name="answer2" value="<?php echo set_value("answer2", $answer2 == null? "": $answer2->answer);?>">
												<?php echo form_error ( "answer2" ); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="form-field-answer3">
												<input type="checkbox" name="fix_position_3" value="1" <?php echo $fix_position_3 == 1? "checked='checked'": ""; ?>/>&nbsp;&nbsp;
												คำตอบ 3: <span style='color: red;'>*</span>
												
											</label>
											<div class="col-sm-9">
												<input type="text" id="form-field-answer3" class="form-control" name="answer3" value="<?php echo set_value("answer3", $answer3 == null? "": $answer3->answer);?>">
												<?php echo form_error ( "answer3" ); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="form-field-answer4">
												<input type="checkbox" name="fix_position_4" value="1" <?php echo $fix_position_4 == 1? "checked='checked'": ""; ?>/>&nbsp;&nbsp;
												คำตอบ 4: <span style='color: red;'>*</span>
											</label>
											<div class="col-sm-9">
												<input type="text" id="form-field-answer4" class="form-control" name="answer4" value="<?php echo set_value("answer4", $answer4 == null? "": $answer4->answer);?>">
												<?php echo form_error ( "answer4" ); ?>
											</div>
										</div>
										
										<hr />
                                                                        
										<div class="form-group">
											<label class="col-sm-2 control-label">
											</label>
											<div class="col-sm-9">
												<span style="color: #00d;">ระบุว่าคำตอบไหนคือคำตอบที่ถูกต้อง โดยอ้างอิงจากลำดับของตัวเลือกคำตอบด้านบน</span>
											</div>
										</div>
									
										<div class="form-group">
											<label class="col-sm-2 control-label" for="form-field-rightanswer">
												คำตอบที่ถูกต้อง: <span style='color: red;'>*</span>
											</label>
											<div class="col-sm-9">
												<select class="form-control" name="right_answer">
													<option value="0">---- เลือกคำตอบที่ถูกต้อง ----</option>
													<option value="1" <?php echo $rightAnswer == 1? "selected='selected'": "";?>>คำตอบที่ 1</option>
													<option value="2" <?php echo $rightAnswer == 2? "selected='selected'": "";?>>คำตอบที่ 2</option>
													<option value="3" <?php echo $rightAnswer == 3? "selected='selected'": "";?>>คำตอบที่ 3</option>
													<option value="4" <?php echo $rightAnswer == 4? "selected='selected'": "";?>>คำตอบที่ 4</option>
												</select>
												<?php echo form_error ( "right_answer" ); ?>
											</div>
										</div>
										<br />
										
										<div class="form-group">
											<label class="col-sm-2 control-label">
											</label>
		                                                                        <div class="col-sm-9">
												<button type="submit" class="btn btn-md btn-success">บันทึก</button>
												<a href="<?php echo site_url( "office/examination/manage/" . $section->alias);?>" class="btn btn-md btn-danger">ยกเลิก</a>
											</div>
										</div>

									</form>
								</div>
							</div>
							<!-- end: BASIC TABLE PANEL -->
						</div>
					</div>
				</div>
			</div>
			<!-- end: PAGE -->
		</div>
		<!-- end: MAIN CONTAINER -->
		
		<?php $this->load->view ( "admin/footer" ); ?>
		
		<!-- start: RIGHT SIDEBAR -->
		<div id="page-sidebar">
			<a class="sidebar-toggler sb-toggle" href="#"><i class="fa fa-indent"></i></a>
			<div class="sidebar-wrapper">
				<ul class="nav nav-tabs nav-justified" id="sidebar-tab">
					<li class="active">
						<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-users"></i></a>
					</li>
					<li>
						<a href="#favorites" role="tab" data-toggle="tab"><i class="fa fa-heart"></i></a>
					</li>
					<li>
						<a href="#settings" role="tab" data-toggle="tab"><i class="fa fa-gear"></i></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="users">
						<div class="users-list">
							<h5 class="sidebar-title">On-line</h5>
							<ul class="media-list">
								<li class="media">
									<a href="#">
										<i class="fa fa-circle status-online"></i>
										<img alt="..." src="assets/images/avatar-2.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Nicole Bell</h4>
											<span> Content Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<div class="user-label">
											<span class="label label-success">3</span>
										</div>
										<i class="fa fa-circle status-online"></i>
										<img alt="..." src="assets/images/avatar-3.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Steven Thompson</h4>
											<span> Visual Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<i class="fa fa-circle status-online"></i>
										<img alt="..." src="assets/images/avatar-4.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<i class="fa fa-circle status-online"></i>
										<img alt="..." src="assets/images/avatar-5.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
							</ul>
							<h5 class="sidebar-title">Off-line</h5>
							<ul class="media-list">
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-6.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Nicole Bell</h4>
											<span> Content Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<div class="user-label">
											<span class="label label-success">3</span>
										</div>
										<img alt="..." src="assets/images/avatar-7.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Steven Thompson</h4>
											<span> Visual Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-8.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-9.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-10.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-5.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="user-chat">
							<div class="sidebar-content">
								<a class="sidebar-back" href="#"><i class="fa fa-chevron-circle-left"></i> Back</a>
							</div>
							<div class="user-chat-form sidebar-content">
								<div class="input-group">
									<input type="text" placeholder="Type a message here..." class="form-control">
									<div class="input-group-btn">
										<button class="btn btn-success" type="button">
											<i class="fa fa-chevron-right"></i>
										</button>
									</div>
								</div>
							</div>
							<ol class="discussion sidebar-content">
								<li class="other">
									<div class="avatar">
										<img src="assets/images/avatar-4.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<span class="time"> 51 min </span>
									</div>
								</li>
								<li class="self">
									<div class="avatar">
										<img src="assets/images/avatar-1.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<span class="time"> 37 mins </span>
									</div>
								</li>
								<li class="other">
									<div class="avatar">
										<img src="assets/images/avatar-4.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
									</div>
								</li>
							</ol>
						</div>
					</div>
					<div class="tab-pane" id="favorites">
						<div class="users-list">
							<h5 class="sidebar-title">Favorites</h5>
							<ul class="media-list">
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-7.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Nicole Bell</h4>
											<span> Content Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<div class="user-label">
											<span class="label label-success">3</span>
										</div>
										<img alt="..." src="assets/images/avatar-6.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Steven Thompson</h4>
											<span> Visual Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-10.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-2.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-4.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="assets/images/avatar-5.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="user-chat">
							<div class="sidebar-content">
								<a class="sidebar-back" href="#"><i class="fa fa-chevron-circle-left"></i> Back</a>
							</div>
							<ol class="discussion sidebar-content">
								<li class="other">
									<div class="avatar">
										<img src="assets/images/avatar-4.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<span class="time"> 51 min </span>
									</div>
								</li>
								<li class="self">
									<div class="avatar">
										<img src="assets/images/avatar-1.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<span class="time"> 37 mins </span>
									</div>
								</li>
								<li class="other">
									<div class="avatar">
										<img src="assets/images/avatar-4.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
									</div>
								</li>
							</ol>
						</div>
					</div>
					<div class="tab-pane" id="settings">
						<h5 class="sidebar-title">General Settings</h5>
						<ul class="media-list">
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green" checked="checked">
										Enable Notifications
									</label>
								</div>
							</li>
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green" checked="checked">
										Show your E-mail
									</label>
								</div>
							</li>
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green">
										Show Offline Users
									</label>
								</div>
							</li>
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green" checked="checked">
										E-mail Alerts
									</label>
								</div>
							</li>
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green">
										SMS Alerts
									</label>
								</div>
							</li>
						</ul>
						<div class="sidebar-content">
							<button class="btn btn-success">
								<i class="icon-settings"></i> Save Changes
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end: RIGHT SIDEBAR -->
		<div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title">Event Management</h4>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-light-grey">
							Close
						</button>
						<button type="button" class="btn btn-danger remove-event no-display">
							<i class='fa fa-trash-o'></i> Delete Event
						</button>
						<button type='submit' class='btn btn-success save-event'>
							<i class='fa fa-check'></i> Save
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<?php
		echo plugin_js_asset ( "admin/respond.min.js" );
		echo plugin_js_asset ( "admin/excanvas.min.js" );
		echo plugin_js_asset ( "admin/jQuery-lib/1.10.2/jquery.min.js" );
		?>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<?php
		echo plugin_js_asset ( "admin/jQuery-lib/2.0.3/jquery.min.js");
		?>
		<!--<![endif]-->
		
		<?php
		echo plugin_js_asset ( "admin/jquery-ui/jquery-ui-1.10.2.custom.min.js");
		echo plugin_js_asset ( "admin/bootstrap/js/bootstrap.min.js");
		echo plugin_js_asset ( "admin/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js");
		echo plugin_js_asset ( "admin/blockUI/jquery.blockUI.js");
		echo plugin_js_asset ( "admin/iCheck/jquery.icheck.min.js");
		echo plugin_js_asset ( "admin/perfect-scrollbar/src/jquery.mousewheel.js");
		echo plugin_js_asset ( "admin/perfect-scrollbar/src/perfect-scrollbar.js");
		echo plugin_js_asset ( "admin/less/less-1.5.0.min.js");
		echo plugin_js_asset ( "admin/jquery-cookie/jquery.cookie.js");
		echo plugin_js_asset ( "admin/bootstrap-colorpalette/js/bootstrap-colorpalette.js");
		echo js_asset ( "admin/main.js" );
		?>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<?php
		//echo plugin_js_asset ( "admin/flot/jquery.flot.js");
		//echo plugin_js_asset ( "admin/flot/jquery.flot.pie.js");
		//echo plugin_js_asset ( "admin/flot/jquery.flot.resize.min.js");
		echo plugin_js_asset ( "admin/jquery.sparkline/jquery.sparkline.js");
		echo plugin_js_asset ( "admin/jquery-easy-pie-chart/jquery.easy-pie-chart.js");
		echo plugin_js_asset ( "admin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js");
		echo plugin_js_asset ( "admin/fullcalendar/fullcalendar/fullcalendar.js");
		echo js_asset ( "admin/index.js" );
		?>
		
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Index.init();
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>