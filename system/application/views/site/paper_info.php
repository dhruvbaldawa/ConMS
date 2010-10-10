<h1><?php echo $content['title']; ?></h1>

<div style="min-width:600px;">
<table class="ajax" width="600px">
    <tr>
        <td><strong>Type</strong></td>
        <td><?php if($content['type'] == 'ltp')
                echo "Long Type";
            else if($content['type'] == 'stp')
                echo "Short Type";
            else
                echo "Poster Type";
            ?></td>
    </tr>
    <tr>
        <td><strong>Description</strong></td>
        <td><?php echo $content['description']; ?></td>
    </tr>
    <tr>
        <td><strong>Authors</strong></td>
        <td>
        <?php
        if(is_array($content['authors']))
        foreach($content['authors'] as $author){
            echo $author['name']."<br />";
        }else{ echo "Not Assigned."; }
        ?>
        </td>
    </tr>
    <tr>
        <td><strong>Chairperson</strong></td>
        <td><?php echo $content['chairperson']['name']; ?></td>
    </tr>
    <tr>
        <td><strong>Track</strong></td>
        <td><?php echo $content['track']['name']; ?></td>
    </tr>
</table>
</div>