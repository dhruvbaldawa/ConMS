<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<script type="text/javascript" src="<?php echo base_url(); ?>js/table2CSV.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/excanvas.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/cufon.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/Geometr231_Hv_BT_400.font.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>
<script type="text/javascript">
InitNotifications();
function getCSVData(){
    var csv_value = $("#data-table").table2CSV({
        delivery: 'value',
        exclude:[0,4,6,8]
    });
     $("#csv_text").val(csv_value);

    return false;
}
</script>
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
			<h1>Tracks <a href="#"><img src="<?php echo base_url(); ?>images/ico_help_32.png" class="help" alt="" /></a></h1>
			<!-- CONTENT BOXES -->
			<div class="content-box">
				<div class="box-header clear">
					<h2>Tracks</h2>
				</div>

				<div class="box-body clear">
					<!-- TABLE -->
                    					<div id="data-table">
                        <form action="<?php echo base_url(); ?>site/export" method ="post" >
<input type="hidden" name="csv_text" id="csv_text">
<input type="submit" value="Export Table"
       onclick="getCSVData()"  />
</form>
					<div id="data-table">
						<form method="post" action="#">

						<table class="datatable">
						<thead>
							<tr>
								<th class="bSortable"><input type="checkbox" class="checkbox select-all" /></th>
								<th>ID</th>
								<th>Title</th>
                                <th>Count</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                            foreach($tracks as $track){ ?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><?php echo $track['id']; ?></td>
                                <td><?php echo $track['name']?></td>
                                <td><?php echo $track['count']?></td>
                                <td>
									<a href="#" class="update_author" rel="<?php echo base_url(); ?>authors/view/author_update_form" id="<?php echo $track['id']; ?>"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a class="delete_author" id="<?php echo $track['id'];?>"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									</td>
							</tr>
                            <?php } ?>
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
</html>
