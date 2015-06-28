<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title><?php echo $this->config->item("project_name"); ?> - การจัดการข้อมูลคำถามสำหรับแบบทดสอบ</title>
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
								<li class="active">
									จัดการแบบทดสอบ <?php echo $section->name; ?> <?php echo $level->name; ?>
								</li>
							</ol>
							<div class="page-header">
								<h1>Question Management <small>manage your question for this current law setion </small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
				
						
						<div class="col-sm-12">
							
							<?php
							if ( $_SERVER["REQUEST_METHOD"] === "GET" && array_key_exists ( "action", $_GET) ) {
								if ( $_GET["action"] == "add" || $_GET["action"] == "edit" ) {
									echo "<div class='alert alert-success'>";
									echo "<button data-dismiss='alert' class='close'>&times;</button>";
									echo "<i class='fa fa-check-circle'></i> ";
									if ( $_GET['action'] == "add" ) {
										echo "สร้างคำถามใหม่เรียบร้อยแล้ว";
									} else {
										echo "แก้ไขข้อมูลคำถามเรียบร้อยแล้ว";
									}
									echo "</div>";
								} else if ( $_GET['action'] == "delete" ) {
									echo "<div class='alert alert-danger'>";
									echo "<button data-dismiss='alert' class='close'>&times;</button>";
									echo "<i class='fa fa-check-circle'></i> ";
									echo "ยกเลิกคำถามเรียบร้อยแล้ว";
									echo "</div>";
								}
							}
							?>
							
							<div class="row">
								<div class="col-sm-9">
									<?php
									foreach ( $levels as $eachLevel):
									?>
										<a href="<?php echo site_url("office/examination/manage/" . $section->alias . "/" . $eachLevel->id);?>" class='btn btn-md btn-<?php echo $eachLevel->id == $levelID? "warning":"default";?>'><?php echo $eachLevel->name; ?></a>
									<?php
									endforeach;
									?>
								</div>
								<div class="col-sm-3">
									<div class='pull-right' style='margin-bottom: 10px;'>
										<a href="<?php echo site_url("office/examination/formQuestion/" . $section->alias . "/" . $level->id);?>" class='btn btn-md btn-primary'><i class='clip-plus-circle-2'></i> สร้างคำถามเพิ่ม</a>
									</div>
								</div>
							</div>
							<br />
												
							<!-- start: Confirm Modal -->
							<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<?php
										echo form_open ( "office/examination/disableQuestion/" . $section->alias . "/" . $level->id);
										?>
										<input type="hidden" name="question_id" id="question_id" />
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
												&times;
											</button>
											<h4 class="modal-title">ยกเลิกคำถาม</h4>
										</div>
										<div class="modal-body">
											<p>
												คุณต้องการยกเลิกการใช้งานคำถามนี้ใช่หรือไม่?​ กรุณากดปุ่ม "ยืนยัน" เพื่อยืนยันการยกเลิกคำถาม
											</p>
										</div>
										<div class="modal-footer">
											<button aria-hidden="true" data-dismiss="modal" class="btn btn-default">
												ยกเลิก
											</button>
											<button type="submit" class="btn btn-danger" >
												ยืนยัน
											</button>
										</div>
										<?php
										echo form_close();
										?>
									</div>
								</div>
							</div>
							<!-- end: Confirm Modal -->
							
							<!-- start: BASIC TABLE PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									คำถามทั้งหมดใน <?php echo $section->name; ?>
									<div class="panel-tools">
									</div>
								</div>
								<div class="panel-body">
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center" width="100">No.</th>
												<th>คำถาม</th>
												<th class="center" width="150"></th>
											</tr>
										</thead>
										
										<tbody>
											<?php
											$number = 0;
											foreach ( $questions as $eachQuestion ) :
											?>
												<tr>
													<td class="center"><?php echo ++$number; ?></td>
													<td><?php echo $eachQuestion->question; ?></td>
													<td class="center">
														<a href="<?php echo site_url( "office/examination/formQuestion/" . $section->alias . "/" . $level->id . "/" . $eachQuestion->id);?>">แก้ไข</a> | <a data-toggle="modal" role="button" href="#confirmModal" class="linkDisable" data-qid="<?php echo $eachQuestion->id; ?>">ยกเลิกคำถาม</a>
													</td>
												</tr>
											<?php
											endforeach;
											
											if ( count($questions) <= 0 ) {
												echo "<tr><td colspan='3' class='center'>ยังไม่มีคำถามใด ๆ ในมาตรานี้</td></tr>";
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
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
				
				$(".linkDisable" ).click ( function () {
					$("#question_id").val ( $(this).data("qid" ));
				});
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>