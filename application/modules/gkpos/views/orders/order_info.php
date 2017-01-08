<div class="menu guest-table">
    <div class="iteammenubg">
        <h2><?php $order_info->order_type == 'table' ? print $this->lang->line('gkpos_table_information') : print $this->lang->line('gkpos_customer_information') ?></h2>
        <table>
            <?php if ($order_info->order_type == 'table'): ?>
                <tr>
                    <td><?php echo $this->lang->line('gkpos_table_number') ?></td>
                    <td><?php echo $order_info->table_number ?></td>
                </tr>
                <tr>
                    <td><?php echo $this->lang->line('gkpos_table_guest_quantity') ?></td>
                    <td><?php echo $order_info->guest_quantity ?></td>
                </tr>
            <?php else: ?>
                <?php if ($order_info->name != null): ?>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_name') ?></td>
                        <td><?php echo $order_info->name ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($order_info->phone != null): ?>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_phone') ?></td>
                        <td><?php echo $order_info->phone ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($order_info->floor_or_apt != null): ?>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_floor_or_apt_no') ?></td>
                        <td><?php echo $order_info->floor_or_apt ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($order_info->building != null): ?>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_building') ?></td>
                        <td><?php echo $order_info->building ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($order_info->house != null): ?>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_house') ?></td>
                        <td><?php echo $order_info->house ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($order_info->street != null): ?>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_street') ?></td>
                        <td><?php echo $order_info->street ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($order_info->postcode != null): ?>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_postal_code') ?></td>
                        <td><?php echo $order_info->postcode ?></td>
                    </tr>
                <?php endif; ?>
            <?php endif ?>
            <tr>
                <td><?php $order_info->order_type == 'table' ? print $this->lang->line('gkpos_table_guest_seated_time') : print 'Created At' ?></td>
                <?php $seated_time = explode(' ', $order_info->created) ?>
                <td><?php echo date('h:i:s a', strtotime($seated_time[1])); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('gkpos_table_first_order_taken') ?></td>
                <?php $first_taken_arr = $first_taken != '' ? explode(' ', $first_taken) : array('', '') ?>
                <td><?php $first_taken_arr[1] != '' ? print date('h:i:s a', strtotime($first_taken_arr[1])) : print $this->lang->line('gkpos_n_a') ?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('gkpos_table_last_order_taken') ?></td>
                <?php $last_taken_arr = $last_taken != '' ? explode(' ', $last_taken) : array('', '') ?>
                <td><?php $last_taken_arr[1] !== '' ? print date('h:i:s a', strtotime($last_taken_arr[1])) : print $this->lang->line('gkpos_n_a') ?></td>
            </tr>

            <tr>
                <td><?php echo $this->lang->line('gkpos_bill_printed') ?></td>
                <td><?php $order_info->bill_printed == 1 ? print $this->lang->line('gkpos_yes') : print $this->lang->line('gkpos_no') ?></td>
            </tr>

        </table>
    </div>
</div>