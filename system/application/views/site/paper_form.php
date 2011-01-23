<h1>Add Paper</h1>

<div style="min-width:600px;">
<div class = "message">
        	<a href="#" class="close" title="Close notification"><span>close</span></a>
				<span class="icon"></span>
			<p></p>
</div>
<form name = "add_paper_form" id = "add_paper_form">
<table class="ajax" width="600px">
    <tr>
        <td><strong>Title</strong></td>
        <td><input type = "text" name = "title" size = "50" /></td>
    </tr>
    <tr>
        <td><strong>Type</strong></td>
        <td><?php if ($this->auth_model->is_chairperson() || $this->auth_model->is_reviewer() || $this->auth_model->is_admin() || $this->auth_model->is_manager()){ ?><select name="type" size="1">
                <option value="ltp">Long Type</option>
                <option value="stp">Short Type</option>
                <option value="pst">Poster Type</option>

            </select>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td><strong>Description</strong></td>
        <td><textarea name="description" cols="62" rows="8"></textarea></td>
    </tr>
    <tr>
        <td><strong>Track</strong></td>
        <td><select id="tracks_id" name="tracks_id">
      </select></td>
    </tr>
    <tr>
        <td><strong>Chairperson</strong></td>
        <td><select id="chairperson_id" name="chairperson_id">
      </select></td>
    </tr>
    <tr>
        <td><strong>Authors</strong></td>
        <td><select id="authors_id" name="authors_id">
        </select></td>
    </tr>
    <tr>
        <td></td>
        <td><input type = "submit" value = "Submit" /><img src="<?php echo base_url();?>images/loading.gif" class="loading" />
</td>
    </tr>
</table>

</form>
</div>