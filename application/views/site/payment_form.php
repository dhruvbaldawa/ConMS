<h1>Add Payment Details</h1>

<div style="min-width:600px;">
    <div class = "message">
        <a href="#" class="close" title="Close notification"><span>close</span></a>
        <span class="icon"></span>
        <p></p>
    </div>
    <form name = "add_payment_form" id = "add_payment_form">
        <table class="ajax" width="600px">
            <tr>
                <td><strong>Author</strong></td>
                <td><select id="author_id" name="author_id">
                    </select></td>
            </tr>
            <tr>
                <td><strong>Paper</strong></td>
                <td><select id="paper_id" name="paper_id">
                    </select></td>
            </tr>
            <tr>
                <td><strong>Amount</strong></td>
                <td>
                    <input type = "text" name = "amount" size = "50" />
                </td>
            </tr>
            <tr>
                <td><strong>Payment Method</strong></td>
                <td>
                    <select name="payment_type" size="1">
                        <option value="cheque">Cheque</option>
                        <option value="cash">Cash</option>
                        <option value="dd">Demand Draft</option>
                        <option value="money transfer">Money Transfer</option>
                        <option value="other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Payment Details</strong></td>
                <td><textarea name="details" cols="62" rows="8"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type = "submit" value = "Submit" /><img src="<?php echo base_url(); ?>images/loading.gif" class="loading" />
                </td>
            </tr>
        </table>

    </form>
</div>