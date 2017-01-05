<a class='payAndClose' href="#payAndClose" style="display:none"></a>
<div style="display:none">
    <style>
        .discount-lebel {
            font-size: 12px;
            font-weight: bold;
        }
    </style>
    <div id="payAndClose" class="popupouter">
        <div class="popup-header row">
            <div id="discountPopupHeader" class="warningPopupHeader col-lg-10 col-md-10 col-sm-10 col-xs-10 pull-left text-uppercase"><?php echo $this->lang->line('gkpos_pay_and_close') ?></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-left closeServiceChargePopup text-center times">&times;</div>
        </div>
        <div class="popup-body row">
            <div id="discountPopupContent" class="warningPopupContent col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="MiddleContent">
                    <?php echo form_open('gkpos/orders/payandclose/', array('id' => 'payAndCloseForm', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                    <div class="row payment-row">
                        <div class="payment-option">
                            <?php if (!empty($payments_option)): ?>
                                <?php foreach ($payments_option as $key => $option): ?>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 payment-button text-center text-uppercase" id="<?php echo $key ?>"><?php echo $option ?></div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row payment-row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 payment-due-block">
                            <div class="due-figure">
                                <span>DUE</span>
                                <span><?php echo $this->config->item('currency_symbol') ?></span><span id="dueAmount">150.00</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="pin-calculatorbg payment-pin-calculatorbg">
                                <input type="text" id="amount" name="table_number" class="form-control" id="inputEmail3">
                                <ul>
                                    <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key1') ?></li>
                                    <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key2') ?></li>
                                    <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key3') ?></li>
                                    <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key4') ?></li>
                                </ul>
                                <ul>

                                    <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key5') ?></li>
                                    <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key6') ?></li>
                                    <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key7') ?></li>
                                    <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key8') ?></li>
                                </ul>
                                <ul>
                                    <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key9') ?></li>
                                    <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key0') ?></li>
                                    <li class="numkey payment-dot-btn"><?php echo '.' ?></li>
                                    <li class="btnPin"><?php echo $this->lang->line('gkpos_numpad_key_del') ?></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <span class="form-submit-button mainsystembg2 waiting-bg img-responsive payment-info-submit-btn " onclick="saveDiscount()"><?php echo $this->lang->line('gkpos_add_payment') ?></span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <span class="btnPin payment-clear-btn"><?php echo $this->lang->line('gkpos_numpad_key_clr') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 payment-due-block">   
                            <div class="payment-option">
                                <br/>
                                <?php if (!empty($payments_option)): ?>
                                    <?php foreach ($payments_option as $key => $option): ?>
                                        <div class="payment-info-button text-center text-uppercase" id="<?php echo $key . 'Amount' ?>"><?php echo $option ?><br/><span><?php echo $this->config->item('currency_symbol') ?></span><span>150.00</span></div>
                                        <br/>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row payment-row"><input class="form-submit-button mainsystembg2 waiting-bg img-responsive payment-info-submit-btn" type="submit" name="submit_form" value="<?php echo $this->lang->line('gkpos_numpad_key_enter') ?>" onclick="saveDiscount()"></div>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function payAndClose(order_id, isCartEmty, $isDbcEmpty, hasNew) {
        if (hasNew == 'yes') {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_payment_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_cart_not_save_before_pay') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
        } else if (!isCartEmty) {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_payment_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_cart_not_save_before_pay') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
        } else if (!$isDbcEmpty && hasNew == 'yes') {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_payment_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_cart_not_save_before_pay') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
        } else if ($isDbcEmpty && isCartEmty && hasNew == 'no') {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_payment_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_payment_for_nothing') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
        } else {
            jQuery(".payAndClose").colorbox({inline: true, slideshow: false, scrolling: false, height: "auto", open: true, width: '60%', left: "20%", right: "20%"});
            return false;
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