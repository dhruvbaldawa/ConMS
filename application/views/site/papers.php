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
<link rel="stylesheet" href="<?php echo base_url(); ?>js/autocomplete/style.css" type="text/css"/>

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
<script type="text/javascript" src="<?php echo base_url(); ?>js/autocomplete/autocomplete.js"></script>
<script type="text/javascript">
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

$('#paper').live("click",function (){
    $.fancybox.showActivity();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>papers/get_all_info",
        data:"ajax=1&id="+this.rel,
        success:function (data){
            $.fancybox(data);
        }
    });
});

$('.update_paper').live("click",function (){
    $.fancybox.showActivity();
    $.ajax({
        type:"POST",
        url:this.rel,
        data:"id="+this.id,
        success:function (data){
            $.fancybox(data);
            $.fancybox.resize();
            $(".message").hide();
            $('.loading').hide();
            $("#tracks_id").fcbkcomplete({
                json_url: "<?php echo base_url(); ?>papers/get_json_tracks",
                filter_case: false,
                filter_hide: true,
			    firstselected: true,
                filter_selected: true,
			    maxitems: 1
          });
          $("#chairperson_id").fcbkcomplete({
                json_url: "<?php echo base_url(); ?>papers/get_json_chairpersons",
                filter_case: false,
                filter_hide: true,
		firstselected: true,
                filter_selected: true,
		maxitems: 1
          });
          $("#authors_id").fcbkcomplete({
                json_url: "<?php echo base_url(); ?>authors/get_json_authors",
                filter_case: false,
                filter_hide: true,
                firstselected: true,
                filter_selected: true
          });
        }
    });
});
$('.paper_link').live("click",function (){
    $.fancybox.showActivity();
    $.ajax({
        type:"POST",
        url:this.rel,
        data:"id="+this.id,
        success:function (data){
            $.fancybox(data);
            $.fancybox.resize();
            $(".message").hide();
            $('.loading').hide();
            $("#tracks_id").fcbkcomplete({
                json_url: "<?php echo base_url(); ?>papers/get_json_tracks",
                filter_case: false,
                filter_hide: true,
		firstselected: true,
                filter_selected: true,
			    maxitems: 1
          });
          $("#chairperson_id").fcbkcomplete({
                json_url: "<?php echo base_url(); ?>papers/get_json_chairpersons",
                filter_case: false,
                filter_hide: true,
		firstselected: true,
                filter_selected: true,
			    maxitems: 1
          });
          $("#authors_id").fcbkcomplete({
                json_url: "<?php echo base_url(); ?>authors/get_json_authors",
                filter_case: false,
                filter_hide: true,
		firstselected: true,
                filter_selected: true
          });
        }
    });
});
$('#update_paper_form').live("submit",function (){
    var data = $(this).serialize();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>papers/update",
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
$('#add_paper_form').live("submit",function (){
    var data = $(this).serialize();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>papers/create",
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
			<h1>Papers <a href="#"><img src="<?php echo base_url(); ?>images/ico_help_32.png" class="help" alt="" /></a></h1>
 <div class="main-icons clear">
				<ul class="clear">
				<li><a href="#" rel="<?php echo base_url(); ?>authors/view/paper_form" class="paper_link"><img src="<?php echo base_url(); ?>images/ico_page_64.png" class="icon" alt="" /><span class="text">Add Paper</span></a></li>
				</ul>
			</div>

			<!-- CONTENT BOXES -->
			<div class="content-box">
				<div class="box-header clear">
					<h2>Papers</h2>
				</div>

				<div class="box-body clear">
                <!-- TABLE -->
					<div id="data-table">
                        <form action="<?php echo base_url(); ?>site/export" method ="post" >
<input type="hidden" name="csv_text" id="csv_text">
<input type="submit" value="Export Table"
       onclick="getCSVData()"  />
</form>
						<form method="post" action="#">

						<table class="datatable">
						<thead>
							<tr>
								<th class="bSortable"><input type="checkbox" class="checkbox select-all" /></th>
								<th>ID</th>
								<th>Title</th>
								<th>Type</th>
                                <th>Pages</th>
								<th>Description</th>
                                <th>Authors</th>
                                <th>Chairperson</th>
                                <th>Track</th>
                                <th>CRC</th>
                                <th>Copyright</th>
                                <th>Actions</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                            foreach($rows as $arow){ ?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><?php echo $arow['id']; ?></td>
								<td><a href="#" id="paper" rel="<?php echo $arow['id']; ?>"><?php echo $arow['title']; ?></a></td>
                                <td><?php
                                    if($arow['type'] == 'ltp')
                                        echo "Long Paper";
                                    else if($arow['type'] == 'stp')
                                        echo "Short Paper";
                                    else if($arow['type'] == 'pst')
                                        echo "Poster";
                                    else
                                        echo "No status";
                                 ?></td>
                                 <td><?php echo $arow['pages']?></td>
                                <td><?php echo $arow['description']; ?></td>
                                <td>
                                <?php
                                    $started = false;
                                    foreach($arow['authors'] as $author){
                                        if(isset($author['id'])){ if($started) {echo ",";} ?> <a href="#" id="author" rel="<?php echo $author['id']; ?>"><?php  echo $author['name'];if(!$started){$started = true;}?></a><br /><?php } else{
                                            echo $author['name'];
                                   }
                                   }
                                   ?>
                                </td>
                                <td>
                                <?php if($arow['chairperson_id']!=0){ ?>
                                <a href="#" id="chairperson" rel="<?php echo $arow['chairperson_id']; ?>"><?php echo $arow['chairperson']['name']; ?></a>
<?php } else { echo $arow['chairperson']['name']; } ?>
</td>
                                <td><?php echo $arow['track']['name']; ?></td>
                                <td><?php echo $arow['crc']?></td>
                                <td><?php echo $arow['copyright']?></td>
                                <td>
									<a href="#" class="update_paper" id="<?php echo $arow['id']; ?>" rel="<?php echo base_url(); ?>papers/view/paper_update_form"><img src="<?php echo base_url(); ?>images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
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
