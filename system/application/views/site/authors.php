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

<script type="text/javascript" src="<?php echo base_url(); ?>js/excanvas.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/cufon.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/Geometr231_Hv_BT_400.font.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>
<script type="text/javascript">
    InitNotifications();
$('#author').live("click",function (){
    $.fancybox.showActivity();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>authors/get_all_info",
        data:"ajax=1&id="+this.rel,
        success:function (data){
            $.fancybox(data);
        }
    });
});

$('.author_link,.update_author').live("click",function (){
    $.fancybox.showActivity();
    $.ajax({
        type:"POST",
        url:this.rel,
        data:"id="+this.id,
        success:function (data){
            $.fancybox(data);
            $(".message").hide();
            $('.loading').hide();
        }
    });
});

$('#add_author_form').live("submit",function (){
    var data = $(this).serialize();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>authors/add_authors",
        data:"ajax=1&"+data,
        dataType:"json",
        beforeSend:function(){
                $('.loading').fadeIn('slow');
        },
        success:function (data){
            if(data.type == 'success'){
                    $.fancybox(data.description);
            }else{
                    var div = $('.message');
                    div.removeClass();
                    div.addClass('message notification '+data.type);
                    div.children('p').html(data.description);
                    div.fadeIn('slow');
                }
                $('.loading').fadeOut('slow');
        }
    });
    return false;
});

$('#update_author_form').live("submit",function (){
    var data = $(this).serialize();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>authors/update",
        data:"ajax=1&"+data,
        dataType:"json",
        beforeSend:function(){
                $('.loading').fadeIn('slow');
        },
        success:function (data){
            if(data.type == 'success'){
                    $.fancybox(data.description);
            }else{
                    var div = $('.message');
                    div.removeClass();
                    div.addClass('message notification '+data.type);
                    div.children('p').html(data.description);
                    div.fadeIn('slow');
                }
                $('.loading').fadeOut('slow');
        }
    });
    return false;
});

$('.delete_author').live("click",function(){
    var thing = confirm("Are you sure you want to delete this author...??");
    if(thing){
        $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>authors/delete",
        data:'id='+this.id,
        success:function (data){
            $.fancybox(data);
        }
    });
    }
});
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
			<h1>Authors <a href="#"><img src="<?php echo base_url(); ?>images/ico_help_32.png" class="help" alt="" /></a></h1>
            <div class="main-icons clear">
				<ul class="clear">
				<li><a href="#" rel="<?php echo base_url(); ?>authors/view/author_form" class="author_link"><img src="<?php echo base_url(); ?>images/ico_users_64.png" class="icon" alt="" /><span class="text">Add Author</span></a></li>
				</ul>
			</div>
			<!-- CONTENT BOXES -->
			<div class="content-box">
				<div class="box-header clear">
					<h2>Authors</h2>
				</div>

				<div class="box-body clear">
					<!-- TABLE -->
					<div id="data-table">
						<p></p>

						<form method="post" action="#">

						<table class="datatable">
						<thead>
							<tr>
								<th class="bSortable"><input type="checkbox" class="checkbox select-all" /></th>
								<th>ID</th>
								<th>Name</th>
								<th>Username</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                            foreach($rows as $arow){ ?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><?php echo $arow['id']; ?></td>
								<td><a href="#" id="author" rel="<?php echo $arow['id']; ?>"><?php echo $arow['name']; ?></a></td>
                                <td><?php echo $arow['username']; ?></td>
                                <td>
									<a href="#" class="update_author" rel="<?php echo base_url(); ?>authors/view/author_update_form" id="<?php echo $arow['id']; ?>"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a class="delete_author" id="<?php echo $arow['id'];?>"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
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
