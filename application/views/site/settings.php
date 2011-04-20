<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="robots" content="ALL,FOLLOW" />
  <meta name="Author" content="AIT" />
  <meta http-equiv="imagetoolbar" content="no" />

  <title>ICWET 2011 - <?php if(isset($title))echo $title; ?></title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/reset.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/screen.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/fancybox.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.wysiwyg.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.ui.css" type="text/css" />
  <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ie7.css" />
<![endif]-->

  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js">
</script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.wysiwyg.js">
</script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fancybox.js">
</script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.idtabs.js">
</script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.datatables.js">
</script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jeditable.js">
</script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.ui.js">
</script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/excanvas.js">
</script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/cufon.js">
</script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/Geometr231_Hv_BT_400.font.js">
</script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/script.js">
</script>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <style type="text/css">
/*<![CDATA[*/
  div.c1 {min-width:600px;}
  /*]]>*/
  </style>
  <script type = "text/javascript">
  $(document).ready(function(){
      $('.loading').hide();
      $('.message').hide();
      $('.close').click(function (){
          $('.message').fadeOut('slow');
      });
  });

  $('#settings_form').live("submit",function (){
    var data = $(this).serialize();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>site/settings",
        data:"ajax=1&"+data,
        dataType:"json",
        beforeSend:function(){
                $('.loading').fadeIn('slow');
        },
        success:function (data){
            if(data.type == 'success'){
                    var div = $('.message');
                    div.removeClass();
                    div.addClass('message notification '+data.type);
                    div.children('p').html(data.description);
                    div.fadeIn('slow');
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
  </script>
</head>

<body>
  <div class="clear">
    <?php
            $this->load->view('includes/sidebar');
        ?>

    <div class="main">
      <!-- *** mainpage layout *** -->

      <div class="main-wrap">
        <div class="header clear">
          <ul class="links clear">
            <li><strong>Welcome <?php echo $this->session->userdata('name'); ?> :</strong></li>

            <li><a href="#"><img src="<?php echo base_url(); ?>images/ico_enelope_24.png" alt=""
            class="icon" /> <span class="text">5 messages</span></a></li>

            <li><a href="#"><img src="<?php echo base_url(); ?>images/ico_view_24.png" alt=""
            class="icon" /> <span class="text">View site</span></a></li>

            <li><a href="<?php echo base_url();?>site/logout"><img src=
            "<?php echo base_url(); ?>images/ico_logout_24.png" alt="" class="icon" /> <span class=
            "text">Logout</span></a></li>
          </ul>
        </div>

        <div class="page clear">
          <h1>Settings <a href="#"><img src="<?php echo base_url(); ?>images/ico_help_32.png"
          class="help" alt="" /></a></h1><!-- CONTENT BOXES -->

          <div class="content-box">
            <div class="box-header clear">
              <h2>Edit Settings</h2>
            </div>

            <div class="box-body clear c1">
            <div class = "message">
        	<a href="#" class="close" title="Close notification"><span>close</span></a>
				<span class="icon"></span>
			<p></p>
            </div>
              <form name="settings_form" id="settings_form">
                <table class="ajax" width="600px">
                <?php foreach($data as $aData){ ?>
                <tr>
                    <td><strong><?php echo $aData['text']; ?></strong></td>

                    <td><input type="text" name="<?php echo $aData['name']; ?>" size="50" value = "<?php echo $aData['value']; ?>"/>
<br /><?php echo $aData['description']; ?></td>
                  </tr>
                  <?php } ?>
                  <tr>
        <td></td>
        <td><input type = "submit" value = "Submit" /><img src="<?php echo base_url();?>images/loading.gif" class="loading" />
</td>
    </tr>
                </table>
              </form>
            </div><!-- end of box-body -->
          </div><!-- end of content-box -->
        </div><!-- end of page -->
        <?php
                    $this->load->view('includes/footer');
        ?>
      </div>
    </div>
  </div>
</body>
</html>