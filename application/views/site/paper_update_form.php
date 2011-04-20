<?php
    $id = $_POST['id'];
    $CI = &get_instance();
    $query = $CI->db->get_where('paper',array('id'=>$id));
    $row = $query->row_array();

    $track = $CI->db->get_where('tracks',array('id'=>$row['tracks_id']))->row_array();

    $chairperson = $CI->db->query('SELECT name,id FROM users WHERE id = '.$row['chairperson_id'])->row_array();

    $author = $CI->db->query("SELECT id,name FROM users WHERE id IN (SELECT authors_id FROM author_paper WHERE paper_id = ".$row['id'].")")->result_array();
?>
<h1>Update Paper(<?php echo $id; ?>)</h1>

<div style="min-width:600px;">
<div class = "message">
        	<a href="#" class="close" title="Close notification"><span>close</span></a>
				<span class="icon"></span>
			<p></p>
</div>
<form name = "update_paper_form" id = "update_paper_form">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<table class="ajax" width="600px">
    <tr>
        <td><strong>Title</strong></td>
        <td><input type = "text" name = "title" size = "50" value="<?php echo $row['title']; ?>" /></td>
    </tr>
    <tr>
        <td><strong>Type</strong></td>
        <td><?php if ($this->auth_model->is_chairperson() || $this->auth_model->is_reviewer() || $this->auth_model->is_admin() || $this->auth_model->is_manager()){ ?><select name="type" size="1">
                <option value="pst" selected>No Status</option>
                <option value="ltp" <?php if ($row['type']=='ltp') echo "selected"; ?>>Long Type</option>
                <option value="stp" <?php if ($row['type']=='stp') echo "selected"; ?>>Short Type</option>
                <option value="pst" <?php if ($row['type']=='pst') echo "selected"; ?>>Poster Type</option>
            </select>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td><strong>Description</strong></td>
        <td><textarea name="description" cols="62" rows="8"><?php echo $row['description']; ?>
        </textarea></td>
    </tr>
    <tr>
        <td><strong>Track</strong></td>
        <td><select id="tracks_id" name="tracks_id">
        <?php if(is_array($track)){ ?>
            <option value="<?php echo $track['id']; ?>" class="selected"><?php echo $track['name'];?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
        <td><strong>Chairperson</strong></td>
        <td><select id="chairperson_id" name="chairperson_id">
        <?php if(isset($chairperson['id'])||isset($chairperson['name'])){ ?>
            <option value="<?php echo $chairperson['id']; ?>" class="selected"><?php echo $chairperson['name'];?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
        <td><strong>Authors</strong></td>
        <td><select id="authors_id" name="authors_id[]">
        <?php if(isset($author[0])){
            foreach($author as $aauthor){
        ?>
            <option value="<?php echo $aauthor['id']; ?>" class="selected"><?php echo $aauthor['name'];?></option>
        <?php }} ?>
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