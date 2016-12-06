<?php if (1 == 1): ?>
    <div class="menu guest-table">
        <div class="iteammenubg">
            <h2><?php echo $this->lang->line('gkpos_table_information') ?></h2>
            <table>
                <tr>
                    <td><?php echo $this->lang->line('gkpos_table_number') ?></td>
                    <td>01</td>
                </tr>
                <tr>
                    <td><?php echo $this->lang->line('gkpos_table_guest_quantity') ?></td>
                    <td>02</td>
                </tr>
                <tr>
                    <td><?php echo $this->lang->line('gkpos_table_guest_seated_time') ?></td>
                    <td>02.50 PM</td>
                </tr>
                <tr>
                    <td><?php echo $this->lang->line('gkpos_table_first_order_taken') ?></td>
                    <td><?php echo $this->lang->line('gkpos_n_a') ?></td>
                </tr>
                <tr>
                    <td><?php echo $this->lang->line('gkpos_table_last_order_taken') ?></td>
                    <td><?php echo $this->lang->line('gkpos_n_a') ?></td>
                </tr>
            </table>
        </div>
    </div>
<?php endif; ?>

<script>
    function getMenuByCategory(id) {
        var firstCatId = $("#firstCatId").val();
        var firstCatOrder = $("#firstCatOrder").val();
        var lastCatId = $("#lastCatId").val();
        var lastCatOrder = $("#lastCatOrder").val();
        console.log(id + " " + firstCatId + " " + firstCatOrder + " " + lastCatId + " " + lastCatOrder);
    }
</script>