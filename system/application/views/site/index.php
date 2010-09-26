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
			<h1>Dashboard <a href="#"><img src="<?php echo base_url(); ?>images/ico_help_32.png" class="help" alt="" /></a></h1>
			<div class="main-icons clear">
				<ul class="clear">
				<li><a href="#"><img src="<?php echo base_url(); ?>images/ico_folder_64.png" class="icon" alt="" /><span class="text">Quick Wizard</span></a></li>
				<li><a href="#"><img src="<?php echo base_url(); ?>images/ico_page_64.png" class="icon" alt="" /><span class="text">Papers</span></a></li>
				<li><a href="#"><img src="<?php echo base_url(); ?>images/ico_users_64.png" class="icon" alt="" /><span class="text">Authors</span></a></li>
				</ul>
			</div>
			<!-- CONTENT BOXES -->
			<div class="content-box">
				<div class="box-header clear">
					<h2>Main Content Box</h2>
				</div>

				<div class="box-body clear">
                    Main Content
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
