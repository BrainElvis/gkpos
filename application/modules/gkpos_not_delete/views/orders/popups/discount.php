<a class='discountPopup' href="#discountPopup" style="display:none"></a>
<div style="display:none">
    <div id="discountPopup" class="popupouter">
        <div class="popup-header row">
            <div id="discountPopupHeader" class="warningPopupHeader col-lg-10 col-md-10 col-sm-10 col-xs-10 pull-left text-uppercase"><?php echo $this->lang->line('gkpos_add_discount') ?></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-left closeServiceChargePopup text-center times">&times;</div>
        </div>
        <div class="popup-body row">
            <div id="discountPopupContent" class="warningPopupContent col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="MiddleContent">
                    <?php echo form_open('gkpos/orders/adddiscount/', array('id' => 'custom_discount_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                    <div id="config_wrapper">
                        <fieldset id="config_info">
                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('gkpos_amount'), 'gk_category_line_page', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i aria-hidden="true"> <?php echo $this->config->item('currency_symbol') ?></i></a></span>
                                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                            <input name="discount" class="form-control required"  type="text" id="discount" value="">
                                        <?php else: ?>
                                            <input name="discount" class="form-control required"  type="text" id="discount" onfocus="myJqueryKeyboard('discount')" value="">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm">	
                                <label for="radio-inline" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label text-uppercase required"><?php echo $this->lang->line('gkpos_function') ?></label>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <label class="radio-inline text-uppercase required"><input type="radio" name="discount_func" id="discount_func1" value="fixed" <?php (isset($charge_func) && $charge_func == "fixed") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_fixed') ?></label>
                                    <label class="radio-inline text-uppercase required"><input type="radio" name="discount_func" id="discount_func2" value="percent" <?php (isset($charge_func) && $charge_func == "percent") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_percentage') ?></label>
                                </div>
                            </div>
                            <ul id="custom_discount_form_error_message_box" class="error_message_box"></ul>
                            <div class="form-group form-group-md">	
                                <div class="col-md-offset-4 col-md-8">
                                    <input type="hidden" id="discountOrderId" name="order_id" value="<?php isset($order_id) ? print $order_id : '' ?>">
                                    <input type="hidden" id="discountCurrentOrderTotal" name="order_total">
                                    <input class="form-submit-button mainsystembg2 waiting-bg img-responsive delivery-info-submit-btn" type="submit" name="submit_form" value="<?php echo $this->lang->line('gkpos_numpad_key_enter') ?>" onclick="saveDiscount()">
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
    function addDiscount(order_id) {
        var orderId = $('#orderId').val();
        var CurrentOrderTotal = $('#CurrentOrderTotal').val();
        if ((!order_id || !orderId) && order_id != orderId) {
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
            } else {
                $('#discountOrderId').val(order_id);
                $('#discountCurrentOrderTotal').val(CurrentOrderTotal);
                jQuery(".discountPopup").colorbox({inline: true, slideshow: false, scrolling: false, height: "300px", open: true, width: '100%', maxWidth: '400px', left: "30%"});
                return false;
            }

        }

    }
    function saveDiscount() {
        $('#custom_discount_form').validate({
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    success: function (response) {
                        jQuery.colorbox.close();
                        loadCart(response.order_id, 'discount');
                    },
                    dataType: 'json'
                });
            },
            errorClass: "has-error",
            errorLabelContainer: "#custom_discount_form_error_message_box",
            wrapper: "li",
            highlight: function (e) {
                $(e).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (e) {
                $(e).closest('.form-group').removeClass('has-error');
            },
            rules:
                    {
                        discount: {
                            number: true,
                            required: true
                        }
                    },
            messages:
                    {
                        service_charge: "<?php echo $this->lang->line('gkpos_discount_amount_required'); ?>",
                    }
        });
    }
</script>