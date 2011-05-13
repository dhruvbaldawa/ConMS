<div class="sidebar"> <!-- *** sidebar layout *** -->
		<div class="logo clear">
			<a href="<?php echo base_url(); ?>site/index" title="View dashboard">
				<img src="<?php echo base_url(); ?>images/logo_earth.png" alt="" class="picture" />
				<span class="title">ICWET</span>
				<span class="text">2011</span>
			</a>
		</div>

		<div class="menu">
			<ul>

            <li><a href="<?php echo base_url(); ?>site/index">Dashboard</a></li>
            <?php if($this->auth_model->is_admin() || $this->auth_model->is_chairperson() || $this->auth_model->is_entry()){ ?>
            <li><a href="<?php echo base_url(); ?>authors">Authors</a></li>
            <?php }if($this->auth_model->is_admin() || $this->auth_model->is_chairperson() || $this->auth_model->is_entry() || !$this->auth_model->is_author() || $this->auth_model->is_reviewer()){ ?>
            <li><a href="<?php echo base_url(); ?>papers">Papers</a></li>
            <?php }if($this->auth_model->is_admin() || $this->auth_model->is_manager()){?>
            <li><a href="<?php echo base_url(); ?>tracks">Tracks</a></li>
            <?php }if($this->auth_model->is_admin()){?>
            <li><a href="<?php echo base_url(); ?>site/index">Users</a></li>
            <?php }if($this->auth_model->is_admin()){?>
            <li><a href="<?php echo base_url(); ?>payment">Payment</a></li>
            <?php }if($this->auth_model->is_admin()){?>
            <li><a href="<?php echo base_url(); ?>site/index">Logs</a></li>
            <?php }if($this->auth_model->is_admin()){?>
            <li><a href="<?php echo base_url(); ?>review">Review</a></li>
            <?php }if($this->auth_model->is_admin()|| !$this->auth_model->is_author()||$this->auth_model->is_chairperson()||$this->auth_model->is_entry()||$this->auth_model->is_manager()){ ?>
            <li><a href="<?php echo base_url(); ?>site/settings">Settings</a></li>
            <?php }if($this->auth_model->is_admin()||$this->auth_model->is_entry()){ ?>
            <li><a href="<?php echo base_url(); ?>site/wizard">Wizard</a></li>
            <?php } ?>
            </ul>
		</div>
	</div>