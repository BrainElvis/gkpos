<a class='SpecialPopup' href="#SpecialPopup" style="display:none"></a>
<div style="display:none">
    <div id="SpecialPopup" class="popupouter">
        <div class="popup-header row">
            <div id="QuantityPopupHeader" class="warningPopupHeader col-lg-10 col-md-10 col-sm-10 col-xs-10 pull-left text-uppercase"><?php echo $this->lang->line('gkpos_system_spacial') ?></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-left closeServiceChargePopup text-center times">&times;</div>
        </div>
        <div class="popup-body row">
            <div id="QuantityPopupContent" class="warningPopupContent col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php echo form_open('gkpos/orders/updatecart', array('id' => 'custom_special_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                <fieldset>
                    <div class="form-group">	
                        <?php echo form_label($this->lang->line('gkpos_system_spacial'), 'customSpecial', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="quantity" class="form-control required"  type="text" id="customSpecial">
                                <ul id="SpecialOptions"></ul>
                            <?php else: ?>
                                <input name="quantity" class="form-control required"  type="text" id="customSpecial" onfocus="myJqueryKeyboard('customSpecial')">
                            <?php endif; ?>

                        </div>
                    </div>
                    <ul id="custom_special_form_error_message_box" class="error_message_box"></ul>
                    <div class="form-group form-group-md">	
                        <div class="col-md-offset-4 col-md-8">
                            <input type="hidden" id="specialOrderId" name="order_id" value="<?php isset($order_id) ? print $order_id : print $this->Orders_Model->get_current_orderid() ?>">
                            <input type="hidden" id="specialLine" name="line" value="">
                            <input type="hidden" name="action" value="special">
                            <input class="form-submit-button mainsystembg2 waiting-bg img-responsive delivery-info-submit-btn" type="submit" name="submit_form" value="<?php echo $this->lang->line('gkpos_numpad_key_enter') ?>" onclick="saveSpecial()">
                        </div>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#customSpecial").autocomplete({
            delay: 0,
            source: '<?php echo site_url('gkpos/orders/get_special') ?>',
            minLength: 2,
            appendTo: "#SpecialOptions"
        });
    });
    function addSpecial(order_id) {
        var line = $('#selectedRow').val();
        var orderId = order_id ? order_id : $('#orderId').val();
        var CurrentOrderTotal = $('#CurrentOrderTotal').val();

        if (!orderId) {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_cart_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_make_order_sure') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
            return false;
        } else {
            if (CurrentOrderTotal <= 0) {
                jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_cart_warning') ?>");
                jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_put_item_on_cart') ?>");
                jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
                return false;
            } else if (!line) {
                jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_cart_warning') ?>");
                jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_select_item_row_to_change_quantity') ?>");
                jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
                return false;
            } else {
                $('#customSpecial').val('');
                $('#specialOrderId').val(order_id);
                $('#specialLine').val(line);
                jQuery(".SpecialPopup").colorbox({inline: true, slideshow: false, scrolling: false, height: "300px", open: true, width: '100%', maxWidth: '400px', left: "30%"});
                return false;
            }
        }

    }
    function saveSpecial() {
        $('#custom_special_form').validate({
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    success: function (response) {
                        jQuery.colorbox.close();
                        loadCart(response.order_id, response.line);
                    },
                    dataType: 'json'
                });
            },
            errorClass: "has-error",
            errorLabelContainer: "#custom_special_form_error_message_box",
            wrapper: "li",
            highlight: function (e) {
                $(e).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (e) {
                $(e).closest('.form-group').removeClass('has-error');
            },
            rules:
                    {
                        quantity: "required"
                    },
            messages:
                    {
                        quantity: "<?php echo $this->lang->line('gkpos_special_required'); ?>",
                    }
        });
    }
</script>