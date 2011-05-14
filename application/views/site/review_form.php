<?php
    $id = $_POST['id'];
    $CI = &get_instance();
    $query = $CI->db->get_where('paper',array('id'=>$id));
    $row = $query->row_array();

    $track = $CI->db->get_where('tracks',array('id'=>$row['tracks_id']))->row_array();

?>

<h1>Review Paper</h1>

<div style="min-width:600px;">
<div class = "message">
        	<a href="#" class="close" title="Close notification"><span>close</span></a>
				<span class="icon"></span>
			<p></p>
</div>
<form name = "review_form" id = "review_form">
<table class="ajax" width="600px">
    <tr>
        <td><strong>Title</strong></td>
        <td><input type = "text" name = "title" size = "50" value="<?php echo $row['title']; ?>" /></td>
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
        <td><strong>Comments</strong></td>
        <td><textarea name="comments" cols="62" rows="8"></textarea></td>
    </tr>
    <tr>
        <td><strong>Track</strong></td>
        <td><select id="tracks_id" name="tracks_id">
      </select></td>
    </tr>
    <tr>

        <td></td>
        <td><input type = "submit" value = "Submit" /><img src="<?php echo base_url();?>images/loading.gif" class="loading" />
</td>
    </tr>
    <tr>
        <td><strong>Upload Paper</strong></td>
        <td><input type="file" name="paper_upload" size="20" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="upload" /></td>
    </tr>
</table>

</form>
</div>