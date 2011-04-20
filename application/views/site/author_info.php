<h1><?php echo $content['name'].' ('.$content['username'].')'; ?></h1>

<div style="min-width:600px;">
<table class="ajax" width="600px">
    <tr>
        <td><strong>E-mail</strong></td>
        <td><?php echo $content['email']; ?></td>
    </tr>
    <tr>
        <td><strong>Address</strong></td>
        <td><?php echo $content['street'].'<br />'.$content['city'].'<br />'.$content['pincode'].'<br />'.$content['state'].'<br />'.$content['country']; ?></td>
    </tr>
    <tr>
        <td><strong>Phone</strong></td>
        <td><?php echo $content['phone']; ?></td>
    </tr>
    <tr>
        <td><strong>TCET</strong></td>
        <td><?php echo $content['home_institute']?"Yes":"No"; ?></td>
    </tr>
</table>
</div>