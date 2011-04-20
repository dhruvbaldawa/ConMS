<?php
    $id = $_POST['id'];
    $CI = &get_instance();
    $query = $CI->db->get_where('users',array('id'=>$id));
    $row = $query->row_array();
?>
<h1>Update Author</h1>

<div style="min-width:600px;">
<div class = "message">
        	<a href="#" class="close" title="Close notification"><span>close</span></a>
				<span class="icon"></span>
			<p></p>
</div>
<form name = "update_author_form" id = "update_author_form">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<table class="ajax" width="600px">
    <tr>
        <td><strong>Name</strong></td>
        <td><input type = "text" name = "name" size = "50" value="<?php echo $row['name']; ?>" /></td>
    </tr>
    <?php /*<tr>
        <td><strong>Username</strong></td>
        <td><input type = "text" name = "username" size = "50" value="<?php echo $row['username']; ?>" /></td>
    </tr>
    <tr>
        <td><strong>Password</strong></td>
        <td><input type = "password" name = "password" size = "50"/></td>
    </tr> */ ?>
    <tr>
        <td><strong>Email</strong></td>
        <td><input type = "text" name = "email" size = "50" value="<?php echo $row['email']; ?>" /></td>
    </tr>
    <tr>
        <td><strong>Phone</strong></td>
        <td><input type = "text" name = "phone" size = "50" value="<?php echo $row['phone']; ?>" /></td>
    </tr>
    <tr>
        <td><strong>Street</strong></td>
        <td><input type = "text" name = "street" size = "50" value="<?php echo $row['street']; ?>" /></td>
    </tr>
    <tr>
        <td><strong>City</strong></td>
        <td><input type = "text" name = "city" size = "50" value="<?php echo $row['city']; ?>" /></td>
    </tr>
    <tr>
        <td><strong>Pincode</strong></td>
        <td><input type = "text" name = "pincode" size = "50" value="<?php echo $row['pincode']; ?>" /></td>
    </tr>
    <tr>
        <td><strong>State</strong></td>
        <td><input type = "text" name = "state" size = "50" value="<?php echo $row['state']; ?>" /></td>
    </tr>
    <tr>
        <td><strong>Country</strong></td>
        <td><input type = "text" name = "country" size = "50" value="<?php echo $row['country']; ?>" /></td>
    </tr>
    <tr>
        <td><strong>TCET</strong></td>
        <td>Yes<input type="radio" name="home_institute" value="1" <?php if ($row['home_institute']) echo "checked=\"checked\""; ?> />No<input type="radio" name="home_institute" value="0" <?php if (!$row['home_institute']) echo "checked=\"checked\""; ?>/></td>
    </tr>
    <tr>
        <td></td>
        <td><input type = "submit" value = "Submit" /><img src="<?php echo base_url();?>images/loading.gif" class="loading" />
</td>
    </tr>
</table>

</form>
</div>