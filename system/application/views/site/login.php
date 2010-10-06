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
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="css/ie7.css" />
<![endif]-->

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/cufon.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/Geometr231_Hv_BT_400.font.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/login.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    InitNotifications();
    $(".message").hide();
    Cufon.replace('.logo .title');
    $('.loading').hide();
    $('form').submit(function(){
        $.ajax({
            url:'<?php echo base_url(); ?>site/login',
            type:'POST',
            dataType:'json',
            data:$(this).serialize(),
            beforeSend:function(){
                $('.loading').fadeIn('slow');
            },
            success: function(data){
                if(data.type == 'success'){
                    window.location.replace(data.detail);
                }else{
                    var div = $('.message');
                    div.removeClass();
                    div.addClass('message notification '+data.type);
                    div.children('p').html(data.detail);
                    div.fadeIn('slow');
                }
                $('.loading').fadeOut('slow');
            }
        });
        return false;
    });
});
</script>

</head>

<body class="no-side">

<div class="login-box">
<div class="login-border">
<div class="login-style">
	<div class="login-header">
		<div class="logo clear">
			<img src="<?php echo base_url(); ?>images/logo_earth.png" alt="" class="picture" />
			<span class="title">ICWET</span>
			<span class="text">2011</span>
		</div>
        <div class = "message">
        	<a href="#" class="close" title="Close notification"><span>close</span></a>
				<span class="icon"></span>
			<p></p>
        </div>
	</div>
<?php echo form_open('site/login'); ?>
		<div class="login-inside">
			<div class="login-data">
				<div class="row clear">
					<label for="user">Username:</label>
    					<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="25" class="text" id="user" />
    				</div>
 				<div class="row clear">
					<label for="password">Password:</label>
					<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="25" class="text" id="password" />
				</div>
				<input type="submit" class="submit" value="Login" />
                <img src="<?php echo base_url();?>images/loading.gif" class="loading" />
			</div>
		</div>
		<div class="login-footer clear">
			<span class="remember">
				<input type="checkbox" class="checkbox" checked="checked" id="remember" /> <label for="remember">Remember</label>
			</span>
		</div>
	</form>

</div>
</div>
</div>

</body>
</html>
