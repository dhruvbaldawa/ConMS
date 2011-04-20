<h1>Add Author</h1>

<div style="min-width:600px;">
<div class = "message">
        	<a href="#" class="close" title="Close notification"><span>close</span></a>
				<span class="icon"></span>
			<p></p>
</div>
<form name = "add_author_form" id = "add_author_form">
<table class="ajax" width="600px">
    <tr>
        <td><strong>Name</strong></td>
        <td><input type = "text" name = "name" size = "50"/></td>
    </tr>
    <?php /*
    <tr>
        <td><strong>Username</strong></td>
        <td><input type = "text" name = "username" size = "50"/></td>
    </tr>
    <tr>
        <td><strong>Password</strong></td>
        <td><input type = "password" name = "password" size = "50"/></td>
    </tr>
    <tr>
        <td><strong>Confirm Password</strong></td>
        <td><input type = "password" name = "cpassword" size = "50"/></td>
    </tr>*/ ?>
    <tr>
        <td><strong>Email</strong></td>
        <td><input type = "text" name = "email" size = "50"/></td>
    </tr>
    <tr>
        <td><strong>Phone</strong></td>
        <td><input type = "text" name = "phone" size = "50"/></td>
    </tr>
    <tr>
        <td><strong>Street</strong></td>
        <td><input type = "text" name = "street" size = "50"/></td>
    </tr>
    <tr>
        <td><strong>City</strong></td>
        <td><input type = "text" name = "city" size = "50"/></td>
    </tr>
    <tr>
        <td><strong>Pincode</strong></td>
        <td><input type = "text" name = "pincode" size = "50"/></td>
    </tr>
    <tr>
        <td><strong>State</strong></td>
        <td><input type = "text" name = "state" size = "50"/></td>
    </tr>
    <tr>
        <td><strong>Country</strong></td>
        <td><input type = "text" name = "country" size = "50"/></td>
    </tr>
    <tr>
        <td><strong>TCET</strong></td>
        <td>Yes<input type="radio" name="home_institute" value="1" />No<input type="radio" name="home_institute" value="0" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type = "submit" value = "Submit" /><img src="<?php echo base_url();?>images/loading.gif" class="loading" />
</td>
    </tr>
</table>

</form>
</div>