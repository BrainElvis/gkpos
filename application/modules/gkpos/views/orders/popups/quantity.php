<a class='QuantityPopup' href="#QuantityPopup" style="display:none"></a>
<div style="display:none">
    <div id="QuantityPopup" class="popupouter">
        <div class="popup-header row">
            <div id="QuantityPopupHeader" class="warningPopupHeader col-lg-10 col-md-10 col-sm-10 col-xs-10 pull-left text-uppercase"><?php echo $this->lang->line('gkpos_add_quantity') ?></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-left closeServiceChargePopup text-center times">&times;</div>
        </div>
        <div class="popup-body row">
            <div id="QuantityPopupContent" class="warningPopupContent col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="MiddleContent">
                    <?php echo form_open('gkpos/orders/updatecart', array('id' => 'custom_quantity_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                    <div id="config_wrapper">
                        <fieldset id="config_info">
                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('gkpos_quantity'), 'quantity', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i aria-hidden="true"> <?php echo $this->config->item('currency_symbol') ?></i></a></span>
                                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                            <input name="quantity" class="form-control required"  type="text" id="customQuantity">
                                        <?php else: ?>
                                            <input name="quantity" class="form-control required"  type="text" id="customQuantity" onfocus="myJqueryKeyboard('customQuantity')" value="">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <ul id="custom_quantity_form_error_message_box" class="error_message_box"></ul>
                            <div class="form-group form-group-md">	
                                <div class="col-md-offset-4 col-md-8">
                                    <input type="hidden" id="quantityOrderId" name="order_id" value="<?php isset($order_id) ? print $order_id : '' ?>">
                                    <input type="hidden" id="quantityLine" name="line" value="">
                                    <input type="hidden" name="action" value="quantity">
                                    <input class="form-submit-button mainsystembg2 waiting-bg img-responsive delivery-info-submit-btn" type="submit" name="submit_form" value="<?php echo $this->lang->line('gkpos_numpad_key_enter') ?>" onclick="saveQuantity()">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function addQuantity() {
        var line = $('#selectedRow').val();
        var order_id = $('#orderId').val();
        var CurrentOrderTotal = $('#CurrentOrderTotal').val();

        if (!order_id) {
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
                $('#customQuantity').val('');
                $('#quantityOrderId').val(order_id);
                $('#quantityLine').val(line);
                jQuery(".QuantityPopup").colorbox({inline: true, slideshow: false, scrolling: false, height: "300px", open: true, width: '100%', maxWidth: '400px', left: "30%"});
                return false;
            }
        }

    }
    function saveQuantity() {
        $('#custom_quantity_form').validate({
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
            errorLabelContainer: "#custom_quantity_form_error_message_box",
            wrapper: "li",
            highlight: function (e) {
                $(e).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (e) {
                $(e).closest('.form-group').removeClass('has-error');
            },
            rules:
                    {
                        quantity: {
                            number: true,
                            required: true
                        }
                    },
            messages:
                    {
                        quantity: "<?php echo $this->lang->line('gkpos_quantity_required'); ?>",
                    }
        });
    }
</script>