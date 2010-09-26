<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<!-- Mirrored from www.ait.sk/uniadmin/ by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 20 Jul 2010 00:37:25 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description"  content=""/>
<meta name="keywords" content=""/>
<meta name="robots" content="ALL,FOLLOW"/>
<meta name="Author" content="AIT"/>
<meta http-equiv="imagetoolbar" content="no"/>
<title>ICWET 2011 - <?php if(isset($title))echo $title; ?></title>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/reset.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/screen.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/fancybox.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.wysiwyg.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.ui.css" type="text/css"/>
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ie7.css" />
<![endif]-->

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.idtabs.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.datatables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jeditable.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.ui.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/excanvas.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/cufon.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/Geometr231_Hv_BT_400.font.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>

</head>

<body>
<div class="clear">
    <?php
        $this->load->view('includes/sidebar');
    ?>
	<div class="main"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="header clear">
			<ul class="links clear">
			<li><strong>Welcome <?php echo $this->session->userdata('name'); ?> :</strong></li>
			<li><a href="#"><img src="<?php echo base_url(); ?>images/ico_enelope_24.png" alt="" class="icon" /> <span class="text">5 messages</span></a></li>
			<li><a href="#"><img src="<?php echo base_url(); ?>images/ico_view_24.png" alt="" class="icon" /> <span class="text">View site</span></a></li>
			<li><a href="<?php echo base_url();?>site/logout"><img src="<?php echo base_url(); ?>images/ico_logout_24.png" alt="" class="icon" /> <span class="text">Logout</span></a></li>
			</ul>
		</div>

		<div class="page clear">
			<h1>Authors <a href="#"><img src="<?php echo base_url(); ?>images/ico_help_32.png" class="help" alt="" /></a></h1>
			<!-- CONTENT BOXES -->
			<div class="content-box">
				<div class="box-header clear">
					<h2>Content Box</h2>
				</div>
				
				<div class="box-body clear">
					<!-- TABLE -->
					<div id="data-table">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem.</p> 
					
						<form method="post" action="#">
						
						<table class="datatable">
						<thead>
							<tr>
								<th class="bSortable"><input type="checkbox" class="checkbox select-all" /></th>
								<th>Column 1</th>
								<th>Column 2</th>
								<th>Column 3</th>
								<th>Column 4</th>
								<th>Column 5</th>
								<th>Column 6</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Lorem ipsum dolor</td>
								<td><a href="#">John</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input1" id="input1" value="235" class="text" size="10" /></td>
								<td>sed in porta lectus</td>
								<td>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
                                                        
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Dignissim enim</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input2" id="input2" value="124" class="text" size="10" /></td>
								<td>duis nec rutrum</td>
								<td>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input3" id="input3" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input4" id="input4" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input5" id="input5" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input6" id="input6" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input7" id="input7" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input8" id="input8" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input9" id="input9" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input10" id="input10" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Duis nec rutrum</td>
								<td><a href="#">John</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input11" id="input11" value="10" class="text" size="10" /></td>
								<td>enim quis ipsum</td>
								<td>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Elit gravida</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input12" id="input12" value="356" class="text" size="10" /></td>
								<td>dolor sit amet</td>
								<td>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
						</tbody>
						</table>
						
						<div class="tab-footer clear fl">
							<div class="fl">
								<select name="dropdown" class="fl-space">
									<option value="option1">choose action...</option>
									<option value="option2">Edit</option>
									<option value="option3">Delete</option>
								</select>
								<input type="submit" value="Apply" id="submit1" class="submit fl-space" />
							</div>
						</div>
						</form>
					</div><!-- /#table -->
				</div> <!-- end of box-body -->
			</div> <!-- end of content-box -->
		</div><!-- end of page -->
        <?php
            $this->load->view('includes/footer');
        ?>
	</div>
	</div>
</div>
</body>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
</html>
