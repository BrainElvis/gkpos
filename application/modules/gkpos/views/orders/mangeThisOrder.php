
<?php
$title = "Manage";
if (isset($order->order_type) && $order->order_type != null) {
    $title.=' ' . $order->order_type;
}
if (isset($order->table_number) && $order->table_number != null) {
    $title.=' ' . $order->table_number;
}
$name = '';
if (isset($order->phone) && $order->phone != null) {
    $name = ' (' . $order->phone . ' )';
}
if (isset($order->name) && $order->name != null) {
    $name = '(' . $order->name . ')';
}

$title.=$name;
?>
<div id="dialog_<?php echo $order->order_type . '_' . $order->id ?>" class="manage-order" title="<?php echo $title ?>">
    <?php if ($detail_counter < 1): ?>
        <button class="ui-button ui-widget ui-corner-all btn-block order-manage-btn" onclick="manageAction('<?php echo $order->order_type . "_" . $order->id ?>', 'add_to_cart')">
            <span class="ui-icon ui-icon-plusthick text-left"></span><span class="text-uppercase text-left"><?php echo $this->lang->line('gkpos_add_item_to_cart') ?></span>
        </button>
    <?php endif; ?>
    <?php if ($detail_counter > 0): ?>
        <button class="ui-button ui-widget ui-corner-all btn-block order-manage-btn" onclick="manageAction('<?php echo $order->order_type . "_" . $order->id ?>', 'edit_cart')">
            <span class="ui-icon ui-icon-pencil"></span> <span class="text-uppercase text-left"><?php echo $this->lang->line('gkpos_edit_cart') ?></span>
        </button>
    <?php endif; ?>
    <button class="ui-button ui-widget ui-corner-all btn-block order-manage-btn" onclick="manageAction('<?php echo $order->order_type . "_" . $order->id ?>', 'delete_order')">
        <span class="ui-icon ui-icon-closethick"></span> <span class="text-uppercase text-left"><?php echo $this->lang->line('gkpos_delete_order') ?></span>
    </button>
    <?php if ($detail_counter > 0): ?>
        <button class="ui-button ui-widget ui-corner-all btn-block order-manage-btn" onclick="manageAction('<?php echo $order->order_type . "_" . $order->id ?>', 'send_kitchen')">
            <span class="ui-icon ui-icon-transferthick-e-w"></span> <span class="text-uppercase text-left"><?php echo $this->lang->line('gkpos_send_order_kitchen') ?></span>
        </button>
    <?php endif; ?>
    <?php if ($detail_counter > 0): ?>
        <button class="ui-button ui-widget ui-corner-all btn-block order-manage-btn" onclick="manageAction('<?php echo $order->order_type . "_" . $order->id ?>', 'print_guest_bill')">
            <span class="ui-icon ui-icon-print"></span> <span class="text-uppercase text-left"><?php echo $this->lang->line('gkpos_print_guest_bill') ?></span>
        </button>
    <?php endif; ?>
</div>
<script>
    function manageAction(id, action) {
        $.ajax({
            url: '<?php echo site_url('gkpos/orders/manageAction') ?>',
            type: "POST",
            data: {
                id: id,
                action: action
            },
            success: function (output) {
                var actionObj = $.parseJSON(output);
                if (true == actionObj.success) {
                    if ($('#' + actionObj.data.dialog).dialog('destroy')) {
                        $('#MangerOrderPopoUp').html('');
                    }
                    getBaseAjaxPage(actionObj.data.url, actionObj.data.info);
                    //document.location.replace(actionObj.data.url);
                }
                console.log(actionObj);
            },
            complete: function (xhr, status) {
                console.log("The request is complete!");
            }
        });
    }
</script>